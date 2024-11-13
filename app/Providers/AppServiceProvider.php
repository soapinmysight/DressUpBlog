<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\ServiceProvider;
use App\Policies\BlogPolicy;
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
    }

}
