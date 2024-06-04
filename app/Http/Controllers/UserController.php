<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        if (auth()->user()->role == 1) {
            $users = User::get();
        }else{
            $users = User::whereId(auth()->user()->id)->get();
        }
        return view('backend.user.index', compact('users'));
    }

    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return redirect()->route('user.index')->with('message', 'New User has been registered');
    }

    function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable|required_with:password'
        ]);

        if ($validated['password'] != '') {
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);
        } else {
            User::findOrFail($id)->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);
        }

        return redirect()->route('user.index')->with('message', 'User has been updated');
    }

    function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('message', 'User has been successfully deleted');
    }
}
