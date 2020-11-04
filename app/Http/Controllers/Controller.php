<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('app');
    }

    public function getImages($folder) {
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

    public function gallery()
    {
        $allImages = $this->getImages('');
        $uxImages = $this->getImages('ux-ui-design');
        $photoImages = $this->getImages('photo-editing');
        $socialImages = $this->getImages('social-media-creative-design');
        $logoImages = $this->getImages('logo-design');

        return view('sections/_gallery', compact('allImages','uxImages','photoImages','socialImages','logoImages'));
    }
}
