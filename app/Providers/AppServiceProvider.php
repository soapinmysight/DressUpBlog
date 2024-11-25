<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Policies\BlogPolicy;
use App\Policies\CommentPolicy;
use App\Policies\ThemePolicy;
use App\Policies\UserPolicy;
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
        // Register the policies for user, theme, blog, and comment
        Gate::policy(Theme::class, ThemePolicy::class);
        Gate::policy(Blog::class, BlogPolicy::class);
        Gate::policy(Comment::class, CommentPolicy::class);
    }

}
