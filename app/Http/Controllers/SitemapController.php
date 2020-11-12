<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ImagesService;
use Carbon\Carbon;

class SitemapController extends Controller
{
    /**
     * Generate sitemap.xml
     */
    public function __invoke()
    {
        $allImages = ImagesService::getImagesForSiteMap('');
        $current_timestamp = Carbon::now()->timestamp;

        return response()->view('sitemap', compact('allImages', 'current_timestamp'))->header('Content-Type', 'text/xml');
    }
}