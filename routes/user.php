<?php


use App\Http\Controllers\CanvasController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Routes for blog
Route::middleware(['auth', 'role:user', 'verified'])
    ->prefix('user')  // This adds '/user' to the URL
    ->name('user.')  // This adds 'user.' to the route name
    ->group(function() {
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index'); // Route to list all blogs
        Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show'); // Route to show a single blog
        Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog-create', [BlogController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.create'); // Route to create a blogs
        Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::get('/blog/{blog}/delete', [BlogController::class, 'delete'])->name('blog.delete');
        Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
        Route::get('/canvas', [CanvasController::class, 'index'])->name('canvas');

    });

// Routes for comments
Route::middleware(['auth', 'role:user', 'verified'])
    ->prefix('user')
    ->name('user.')
    ->group(function() {
        Route::post('/blog/{blog}/comment', [CommentController::class, 'store'])->name('comment.store');
        Route::get('/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
        Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
        Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    });

require __DIR__.'/auth.php';

