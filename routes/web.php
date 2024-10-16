<?php

use App\Http\Controllers\CanvasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about-us', function() {
    return view('about-us');});


Route::get('/home/{name}', [HomeController::class, 'index'])->name('home');

//Route::get('/home/{name}', function (string $name){
//    return view("home", [
//        "name" => $name
//    ]);
//});

Route::get('/contact', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('contact');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/canvas', [CanvasController::class, 'index'])->middleware(['auth', 'verified'])->name('canvas');


require __DIR__.'/auth.php';
