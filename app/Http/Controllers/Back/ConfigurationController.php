<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    function index()
    {
        $configs = Configuration::paginate(5);
        return view('backend.configuration.index', compact('configs'));
    }

    function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'value' => 'required|min:3',
        ]);
        
        Configuration::findOrFail($id)->update($validated);
        return redirect()->back()->with('message', 'success');
    }
}
