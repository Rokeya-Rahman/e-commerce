<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['admin.category.add-category', 'admin.category.edit-category'], function ($view) {
            $view->levels = Category::where('level_id', null)
                                    ->where('publication_status', 1)
                                    ->get();
        });

        View::composer(['admin.category.manage-category'], function ($view) {
            $view->categories = Category::orderby('id', 'desc')->get();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
