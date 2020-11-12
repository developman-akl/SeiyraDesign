<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagesService
{
    public static function getImages($folder) {
        $path = "storage/portfolio/".$folder;
        $files = File::files($path); // Shows files only from the root folder, nothing from the subfolders

        // only images - exclude thumbnails
        $filtered_files = array_filter($files, function($str){
            return 
            strpos($str, "thumbnail") === false
            && (strpos(pathinfo($str, PATHINFO_EXTENSION), "jpg") === 0
            ||  strpos(pathinfo($str, PATHINFO_EXTENSION), "png") === 0);
        });

        $images_array = [];
        foreach($filtered_files as $file)
        {
            $filename = substr($file->getFilename(), 0, -4);
            $pathname = $file->getPathname();
            $pathname_thumbnail =   str_replace( 
                                        strpos(pathinfo($pathname, PATHINFO_EXTENSION), "jpg") === 0 ? '.jpg' : '.png', 
                                        strpos(pathinfo($pathname, PATHINFO_EXTENSION), "jpg") === 0 ? '-thumbnail.jpg' : '-thumbnail.png' , 
                                        $pathname 
                                    );

            $image = Image::make($file);
            $height = $image->height();
            $width = $image->width();
            $size = $width . "x" . $height;

            array_push(
                $images_array, 
                array( 
                    'title' => $filename, 
                    'large_image' => $pathname, 
                    'thumbnail' => $pathname_thumbnail, 
                    'size' => $size
                )
            );
        }
        
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