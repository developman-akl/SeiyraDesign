<?php

namespace App\Http\Controllers;

use App\Services\ImagesService;
use App\Testimonial;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $testimonials = Testimonial::all();
        $firstTestimonialId = count($testimonials) > 0 ? DB::table('testimonials')->first()->id : null;

        return view('app', compact('testimonials', 'firstTestimonialId'));
    }

    public function gallery()
    {
        $allImages = cache()->rememberForever('allImages', function () {
            return ImagesService::getImages('');
        });
        
        $uxImages = cache()->rememberForever('uxImages', function () {
            return ImagesService::getImages('ux-ui-design');
        });

        $photoImages = cache()->rememberForever('photoImages', function () {
            return ImagesService::getImages('photo-editing');
        });

        $socialImages = cache()->rememberForever('socialImages', function () {
            return ImagesService::getImages('social-media-creative-design');
        });

        $logoImages = cache()->rememberForever('logoImages', function () {
            return ImagesService::getImages('logo-design');
        });

        return view('sections/gallery', compact('allImages', 'uxImages','photoImages','socialImages','logoImages'));
    }
}
