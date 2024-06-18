<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ConfigurationController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// FrontEnd Route
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/', [HomeController::class, 'index'])->name('home.search');
Route::get('p/{slug}', [PostController::class, 'show'])->name('home.show');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('home.category');
Route::get('/all-post', [PostController::class, 'showAll'])->name('home.all-post');
Route::post('/all-post', [PostController::class, 'showAll'])->name('home.search-post');

// BackEnd Route
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('article', ArticleController::class);
    Route::resource('category', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1');
    Route::resource('config', ConfigurationController::class)->only([
        'index', 'update',
    ])->middleware('UserAccess:1');
    Route::resource('user', UserController::class);
    // File Manager Route
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
