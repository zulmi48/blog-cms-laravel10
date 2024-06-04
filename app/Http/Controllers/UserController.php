<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::latest()->get();
        return view('backend.user.index', compact('users'));
    }
}
