<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;

Route::middleware(['auth', 'role:admin', 'verified'])
    ->prefix('admin')  // This adds '/user' to the URL
    ->name('admin.')  // This adds 'user.' to the route name
    ->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog.index'); // Route to list all blogs
        Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show'); // Route to show a single blog
        Route::patch('/blog/{blog}/toggle', [AdminBlogController::class, 'toggle'])->name('blog.toggle'); // Route to toggle blog activity
    });


require __DIR__.'/auth.php';
