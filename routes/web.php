<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ 'as' => 'home', 'uses' => 'Controller@index' ]);

Route::get('contact-us', 'ContactMeController@contactMe');
Route::post('contact-us', ['as'=>'contactme.store','uses'=>'ContactMeController@contactMePost']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('sitemap.xml', 'SitemapController');
Route::get('robots.txt', 'RobotsController');