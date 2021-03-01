<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ImagesService
{
    public static function time_elapsed()
    {
        static $last = null;

        $now = microtime(true);

        if ($last != null) {
            return '<!-- ' . ($now - $last) . ' -->';
        }

        $last = $now;
    }

    public static function getImages($folder) {
        $path = "storage/portfolio/".$folder;
        $files = $folder ? File::files($path) : File::allFiles($path); // Shows files only from the root folder, nothing from the subfolders OR Shows all files from the folder, subfolders too

        // only images - exclude thumbnails
        $filtered_files = array_filter($files, function($str){
            return 
                strpos($str, "thumbnail") === false
                && (exif_imagetype($str) === 2      //jpg
                ||  exif_imagetype($str) === 3);    //png
        });

        $images_array = [];
        foreach($filtered_files as $file)
        {
            $cTime = $file->getcTime();
            $filename = substr($file->getFilename(), 0, -4);
            $pathname = $file->getPathname();
            $pathname_thumbnail =   str_replace( 
                                        exif_imagetype($pathname) === 2 ? '.jpg' : '.png', 
                                        exif_imagetype($pathname) === 2 ? '-thumbnail.jpg' : '-thumbnail.png', 
                                        $pathname 
                                    );

            $imagesize = getimagesize($pathname);
            $size = $imagesize[0]."x".$imagesize[1];

            array_push(
                $images_array, 
                    array( 
                        'title' => $filename, 
                        'large_image' => $pathname, 
                        'thumbnail' => $pathname_thumbnail, 
                        'size' => $size,
                        'cTime' => $cTime,
                    )
            );
        }

        usort($images_array, function($a, $b) {
            return $b['cTime'] <=> $a['cTime'];
        });

        return $images_array;
    }

    public static function getImagesForSiteMap($folder) {
        $path = "storage/portfolio/".$folder;
        $files = File::allFiles($path);

        $fitlered_files = array_filter($files, function($str){
            return 
                strpos(pathinfo($str, PATHINFO_EXTENSION), "jpg") === 0
            ||  strpos(pathinfo($str, PATHINFO_EXTENSION), "png") === 0;

        });

        return $fitlered_files;
    }

    public static function get_key_val($arrs, $k) {
        foreach( $arrs as $key=>$val ) {
            if( $key === $k ) {
                return $val;
            }
            else {
                if( is_array( $val ) ) {
                    $ret = ImagesService::get_key_val( $val, $k );
    
                    if( $ret !== NULL) {
                        return $ret;
                    }
                }
            }
        }
    
        return NULL;
    }

}