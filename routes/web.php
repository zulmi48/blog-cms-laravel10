<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('category', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
Route::resource('article', ArticleController::class);

// File Manager Route
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
