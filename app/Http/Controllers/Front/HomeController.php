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
        $featured_post = Article::orderBy('views', 'desc')->first();
        $articles = Article::latest()->get();
        $categories = Category::get();
        return view('frontend.home.index', compact('featured_post', 'articles', 'categories'));
    }
}
