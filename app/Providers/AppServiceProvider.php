<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        $blogs = [];
        if (Schema::hasTable((new Blog())->getTable())) {
            $blogsObj = new Blog();
            $blogs = $blogsObj->all();
        }
        View::share('blogs', $blogs);

        $categories = [];
        if (Schema::hasTable((new Category())->getTable())) {
            $categoriesObj = new Category();
            $categories = $categoriesObj->all();
        }
        View::share('categories', $categories);
    }
}
