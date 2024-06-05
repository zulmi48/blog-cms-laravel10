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
    public function __invoke(Request $request)
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $articles = Article::with('categories')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(6);
        } else {
            $articles = Article::with('categories')
                ->latest()
                ->whereStatus(1)
                ->simplePaginate(2);
        }
        $featured_post = Article::orderBy('views', 'desc')
            ->whereStatus(1)
            ->first();
        $categories = Category::get();
        return view('frontend.home.index', compact('featured_post', 'articles', 'categories'));
    }
}
