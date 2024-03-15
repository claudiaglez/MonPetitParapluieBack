<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories',  'index' );
    Route::get('/categories/{id}',  'show' );
    Route::post('/categories',  'store' );
      
 });

 Route::controller(ArticleController::class)->group(function() {
    Route::get('/articles',  'index' );
    Route::get('/articles/{id}',  'show' );
    Route::post('/articles',  'store' );
    Route::put('/articles/{id}',  'update' );
    Route::delete('/articles/{id}',  'destroy' );
}); 
