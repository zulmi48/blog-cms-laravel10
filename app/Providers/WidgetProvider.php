<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('frontend.layouts.widgets', function ($view) {
            $category = Category::withCount(['articles' => function (Builder $query) {
                $query->where('status', 1);
            }])->latest()->get();
            $view->with('categories', $category);
        });
        View::composer('frontend.layouts.widgets', function ($view) {
            $post = Article::orderBy('views', 'desc')->take(3)->get();
            $view->with('popular_posts', $post);
        });
    }
}
