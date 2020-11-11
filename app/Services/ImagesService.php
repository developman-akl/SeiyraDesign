<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ImagesService
{
    public static function getImages($folder) {
        $path = "storage/portfolio/".$folder;
        $files = File::files($path); // Shows files only from the root folder, nothing from the subfolders

        $fitlered_files = array_filter($files, function($str){
            return 
                strpos(pathinfo($str, PATHINFO_EXTENSION), "jpg") === 0
            ||  strpos(pathinfo($str, PATHINFO_EXTENSION), "png") === 0;

        });

        return $fitlered_files;
    }
}