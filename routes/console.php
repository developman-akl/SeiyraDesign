<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

// Drop this in routes/console.php then just run php artisan logs:clear
Artisan::command('logs:clear', function() {
    exec('truncate -s 0 ' . storage_path('logs/*.log'));
    $this->comment('Logs have been cleared!');
})->describe('Clear log files');