<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);
Route::get('categories/{category}/articles', [CategoryController::class, 'articles']);
