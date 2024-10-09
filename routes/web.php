<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function() {
    return view('about-us');});

Route::get('/test', [AboutUsController::class, 'index']);

Route::get('/home/{name}', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

