<?php

namespace App\Http\Controllers;

use App\Services\ImagesService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('app');
    }

    public function gallery()
    {
        $uxImages = ImagesService::getImages('ux-ui-design');
        $photoImages = ImagesService::getImages('photo-editing');
        $socialImages = ImagesService::getImages('social-media-creative-design');
        $logoImages = ImagesService::getImages('logo-design');

        return view('sections/gallery', compact('uxImages','photoImages','socialImages','logoImages'));
    }
}
