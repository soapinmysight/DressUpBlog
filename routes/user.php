<?php


use App\Http\Controllers\User\BlogController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:user', 'verified'])
    ->prefix('user')  // This adds '/user' to the URL
    ->name('user.')  // This adds 'user.' to the route name
    ->group(function() {
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index'); // Route to list all blogs
        Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show'); // Route to show a single blog
        Route::get('/blog-create', [BlogController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.create'); // Route to create a blogs
        Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    });


require __DIR__.'/auth.php';
