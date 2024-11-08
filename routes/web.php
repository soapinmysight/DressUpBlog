<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CanvasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\User\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', function () {
    return view('blogs', [
        'blogs' => Blog::all()
        ]
    );
})->name('blogs');




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


Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/home/{name}', function (string $name){
//    return view("home", [
//        "name" => $name
//    ]);
//});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/canvas', [CanvasController::class, 'index'])->middleware(['auth', 'verified'])->name('canvas');
//Route::get('/blog', [BlogController::class, 'index'])->name('blog');

//Route::get('/theme.create', [ThemeController::class, 'index'])->name('create theme');

Route::resource('/theme', ThemeController::class);
Route::resource('/comment', CommentController::class);

Route::resource('/blog', BlogController::class);

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index'); // Route to list all blogs
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show'); // Route to show a single blog
Route::get('/blog-create', [BlogController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.create'); // Route to create a blogs


require __DIR__.'/auth.php';
require __DIR__.'/user.php';
