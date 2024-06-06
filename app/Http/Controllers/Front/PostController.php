<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function show(string $slug)
    {
        $article = Article::whereSlug($slug)
            ->with('categories')
            ->firstOrFail();
        $categories = Category::get();
        return view('frontend.home.show', compact('article', 'categories'));
    }

    function showAll()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $articles = Article::with('categories')
                ->whereStatus(1)
                ->where('title', 'like', '%' . $keyword . '%')
                ->latest()
                ->paginate(9);
        } else {
            $articles = Article::with('categories')
                ->latest()
                ->whereStatus(1)
                ->paginate(9);
        }
        return view('frontend.home.all-post', compact('articles', 'keyword'));
    }
}
