<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\ServiceProvider;
use App\Policies\BlogPolicy;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        // Register the Blog policy
        Gate::policy(Blog::class, BlogPolicy::class);
        // Register the Comment policy
        Gate::policy(Comment::class, CommentPolicy::class);
    }

}
