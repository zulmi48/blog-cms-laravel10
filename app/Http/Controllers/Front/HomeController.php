<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $articles = Article::with('categories', 'users')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $articles = Article::with('categories', 'users')
                ->latest()
                ->whereStatus(1)
                ->simplePaginate(4);
        }
        $featured_post = Article::orderBy('views', 'desc')
            ->whereStatus(1)
            ->first();
        return view('frontend.home.index', compact('featured_post', 'articles', ));
    }

    function category(string $slug)
    {
        $category_slug = $slug;
        $category = Category::whereSlug($category_slug)->first();
        $articles = Article::with('categories')
            ->whereStatus(1)
            ->whereCategoriesId($category->id)
            ->latest()
            ->paginate(6);
        return view('frontend.home.index', compact('articles', ));
    }
}
