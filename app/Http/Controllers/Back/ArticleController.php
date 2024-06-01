<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('categories')->latest()->get();
        return view('backend.article.index', compact('articles'));
    }

    public function create()
    {
        return view('backend.article.create', [
            'categories' => Category::get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'categories_id' => 'required',
            'description' => 'required|min:5',
            'img' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'required',
            'publish_date' => 'required',
        ]);

        $file = $request->file('img');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs('public/back/', $fileName);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['img'] = $fileName;
        $validated['views'] = 0;

        Article::create($validated);
        return redirect()->route('article.index')->with('message', 'New article has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
