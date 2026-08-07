<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Blog;

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
         // Share latest blogs with all views that extend the master layout
         View::composer('front.app', function ($view) {
            $latestBlogs = Blog::orderBy('created_at', 'desc')->take(2)->get();
            $view->with('latestBlogs', $latestBlogs);
        });
    }
}
