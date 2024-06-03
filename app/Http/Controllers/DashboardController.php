<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('backend.dashboard', [
            'total_article' => Article::count(),
            'total_category' => Category::count(),
            'latest_article' => Article::with('categories')->whereStatus(1)->latest()->take(5)->get(),
            'popular_article' => Article::with('categories')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get(),
        ]);
    }
}
