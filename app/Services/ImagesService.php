<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class ImagesService
{
    public static function getImages($folder) {
        $path = "storage/portfolio/".$folder;
        // $files = File::files($path); // Shows files only from the root folder, nothing from the subfolders
        $files = File::allFiles($path); // Shows all the files from all the subfolders

        $fitlered_files = array_filter($files, function($str){
            return 
                strpos(pathinfo($str, PATHINFO_EXTENSION), "jpg") === 0
            ||  strpos(pathinfo($str, PATHINFO_EXTENSION), "png") === 0;

        });

        return $fitlered_files;
    }
}