<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CanvasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Models\Blog;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', function () {
    return view('blogs', [
        'blogs' => Blog::all()
        ]
    );
})->name('blogs');

//for detail page blog

//Route::get('/blogs/{id}', function ($id) {
//    $blogs = Blog::all();//fetch all blogs
//    $blog = Arr::first($blogs, fn($blog) => $blog['id'] == $id); //find blog by its id
//    if (!$blog) { abort(404, 'Blog not found');} //throw error if not found
//})->name('blog');


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
