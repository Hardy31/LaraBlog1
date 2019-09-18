<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //dd(122344);
        view()->composer('pages._sidebar', function ($view){
            $view->with('popularPosts', Post::orderBy('wiev', 'desc')->take(4)->get());
            $view->with('featuredPosts', Post::where('is_featured', '1')->take(3)->get());
            $view->with('recentPosts', Post::orderBy('date', 'desc')->take(2)->get());
            $view->with('categories', Category::all());
        });

    }
}
