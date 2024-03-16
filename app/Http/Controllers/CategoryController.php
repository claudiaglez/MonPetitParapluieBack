<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('category');
        return $categories;
    }

    public function show($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:categories',
        ]);
    
        $category = new Category(); 
        $category->category = $request->input('category');
        $category->save(); 
    
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category' => 'required|string|max:255|unique:categories,category,' . $category->id,
        ]);

        $category->category = $request->input('category');
        $category->save();

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }

}
