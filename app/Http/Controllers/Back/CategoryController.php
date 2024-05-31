<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()->back()->with('message', 'New category has been successfully added');
    }
    
    public function show(string $id)
    {
        //
    }
    
    public function edit(string $id)
    {
        //
    }
    
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
        ]);
        $validated['slug'] = Str::slug($validated['name']);

        Category::findOrFail($id)->update($validated);

        return redirect()->back()->with('message', 'Category has been successfully updated');
    }
    
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->back()->with('message', 'Category has been successfully deleted');
    }
}
