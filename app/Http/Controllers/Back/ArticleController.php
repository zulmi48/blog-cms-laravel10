<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $file->storeAs('public/back/', $fileName);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['img'] = $fileName;
        $validated['views'] = 0;

        Article::create($validated);
        return redirect()->route('article.index')->with('message', 'New article has been added');
    }

    public function show(string $id)
    {
        return view('backend.article.show', [
            'article' => Article::find($id),
        ]);
    }

    public function edit(string $id)
    {
        return view('backend.article.edit', [
            'article' => Article::find($id),
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'categories_id' => 'required',
            'description' => 'required|min:5',
            'img' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048',
            'status' => 'required',
            'publish_date' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);

            Storage::delete('public/back/' . $request->oldImg);

            $validated['img'] = $fileName;
        } else {
            $validated['img'] = $request->oldImg;
        }

        $validated['slug'] = Str::slug($validated['title']);
        $validated['views'] = 0;

        Article::find($id)->update($validated);
        return redirect()->route('article.index')->with('message', 'Article has been updated');
    }

    public function destroy(string $id)
    {
        $article = Article::find($id);
        Storage::delete('public/back/' . $article->img);
        $article->delete();

        return response()->json([
            'message' => "Article has been deleted"
        ]);
    }
}
