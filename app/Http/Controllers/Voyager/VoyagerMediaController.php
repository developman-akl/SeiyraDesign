<?php

namespace App\Http\Controllers\Voyager;

use App\Services\ImagesService;
use TCG\Voyager\Http\Controllers\VoyagerMediaController as BaseVoyagerMediaController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Events\MediaFileAdded;

class VoyagerMediaController extends BaseVoyagerMediaController
{
    /** @var string */
    private $filesystem;

    public function __construct()
    {
        $this->filesystem = config('voyager.storage.disk');
    }

    public function upload(Request $request)
    {
        // Check permission
        $this->authorize('browse_media');

        $extension = $request->file->getClientOriginalExtension();
        $name = Str::replaceLast('.'.$extension, '', $request->file->getClientOriginalName());
        $details = json_decode($request->get('details') ?? '{}');
        $absolute_path = Storage::disk($this->filesystem)->path($request->upload_path);
        $quality = is_object($details) && property_exists($details, 'quality') && $details->quality ? $details->quality : 100;

        try {
            Cache::flush();

            $realPath = Storage::disk($this->filesystem)->getDriver()->getAdapter()->getPathPrefix();

            $allowedMimeTypes = config('voyager.media.allowed_mimetypes', '*');
            if ($allowedMimeTypes != '*' && (is_array($allowedMimeTypes) && !in_array($request->file->getMimeType(), $allowedMimeTypes))) {
                throw new Exception(__('voyager::generic.mimetype_not_allowed'));
            }

            if (!$request->has('filename') || $request->get('filename') == 'null') {
                while (Storage::disk($this->filesystem)->exists(Str::finish($request->upload_path, '/').$name.'.'.$extension, $this->filesystem)) {
                    $name = get_file_name($name);
                }
            } else {
                $name = str_replace('{uid}', Auth::user()->getKey(), $request->get('filename'));
                if (Str::contains($name, '{date:')) {
                    $name = preg_replace_callback('/\{date:([^\/\}]*)\}/', function ($date) {
                        return \Carbon\Carbon::now()->format($date[1]);
                    }, $name);
                }
                if (Str::contains($name, '{random:')) {
                    $name = preg_replace_callback('/\{random:([0-9]+)\}/', function ($random) {
                        return Str::random($random[1]);
                    }, $name);
                }
            }

            $file = $request->file->storeAs($request->upload_path, $name.'.'.$extension, $this->filesystem);
            $file = preg_replace('#/+#', '/', $file);

            $imageMimeTypes = [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/svg+xml',
            ];
            if (in_array($request->file->getMimeType(), $imageMimeTypes)) {
                $content = Storage::disk($this->filesystem)->get($file);
                $image = Image::make($content);

                if ($request->file->getClientOriginalExtension() == 'gif') {
                    copy($request->file->getRealPath(), $realPath.$file);
                } else {
                    $image = $image->orientate();
                    // Generate thumbnails
                    if (property_exists($details, 'thumbnails') && is_array($details->thumbnails)) {
                        foreach ($details->thumbnails as $thumbnail_data) {
                            $type = $thumbnail_data->type ?? 'fit';
                            $thumbnail = Image::make(clone $image);
                            if ($type == 'fit') {
                                $thumbnail = $thumbnail->fit(
                                    $thumbnail_data->width,
                                    ($thumbnail_data->height ?? null),
                                    function ($constraint) {
                                        $constraint->aspectRatio();
                                    },
                                    ($thumbnail_data->position ?? 'center')
                                );
                            } elseif ($type == 'crop') {
                                $thumbnail = $thumbnail->crop(
                                    $thumbnail_data->width,
                                    $thumbnail_data->height,
                                    ($thumbnail_data->x ?? null),
                                    ($thumbnail_data->y ?? null)
                                );
                            } elseif ($type == 'resize') {
                                $thumbnail = $thumbnail->resize(
                                    $thumbnail_data->width,
                                    ($thumbnail_data->height ?? null),
                                    function ($constraint) use ($thumbnail_data) {
                                        $constraint->aspectRatio();
                                        if (!($thumbnail_data->upsize ?? true)) {
                                            $constraint->upsize();
                                        }
                                    }
                                );
                            }
                            if (
                                property_exists($details, 'watermark') &&
                                property_exists($details->watermark, 'source') &&
                                property_exists($thumbnail_data, 'watermark') &&
                                $thumbnail_data->watermark
                            ) {
                                $thumbnail = $this->addWatermarkToImage($thumbnail, $details->watermark);
                            }
                            $thumbnail_file = $request->upload_path.$name.'-'.($thumbnail_data->name ?? 'thumbnail').'.'.$extension;

                            Storage::disk($this->filesystem)->put($thumbnail_file, $thumbnail->encode($extension, (is_object($details) && property_exists($thumbnail_data, 'quality') && $thumbnail_data->quality ? intval ($thumbnail_data->quality, 10) : 100))->encoded);
                        }
                    }

                    // Add watermark to image
                    if (property_exists($details, 'watermark') && property_exists($details->watermark, 'source')) {
                        $image = $this->addWatermarkToImage($image, $details->watermark);
                    }

                    $newImage = $image->encode($extension, 100)->encoded;
                    
                    Storage::disk($this->filesystem)->put($file, $newImage);
                }
            }

            $success = true;
            $message = __('voyager::media.success_uploaded_file');
            $path = preg_replace('/^public\//', '', $file);

            event(new MediaFileAdded($path));
        } catch (Exception $e) {
            $success = false;
            $message = $e->getMessage();
            $path = '';
        }

        return response()->json(compact('success', 'message', 'path'));
    }

    public function delete(Request $request)
    {
        // Check permission
        $this->authorize('browse_media');

        $path = str_replace('//', '/', Str::finish($request->path, '/'));
        $success = true;
        $error = '';
        
        Cache::flush();

        foreach ($request->get('files') as $file) {
            $file_path = $path.$file['name'];
            $file_path_thumbnail = $path.ImagesService::get_key_val( $file, "basename" );

            if ($file['type'] == 'folder') {
                if (!Storage::disk($this->filesystem)->deleteDirectory($file_path)) {
                    $error = __('voyager::media.error_deleting_folder');
                    $success = false;
                }
            } 
            else
            {
                // image
                if (!Storage::disk($this->filesystem)->delete($file_path)) {
                    $error = __('voyager::media.error_deleting_file');
                    $success = false;
                }
                // thumbnail
                if (!Storage::disk($this->filesystem)->delete($file_path_thumbnail)) {
                    $error = __('voyager::media.error_deleting_file');
                    $success = false;
                }
            }
        }

        return compact('success', 'error');
    }

}
