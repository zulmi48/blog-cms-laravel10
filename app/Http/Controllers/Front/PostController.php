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
}
