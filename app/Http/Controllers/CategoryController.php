<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return $categories;
    }

    public function show($id){
        $categories= Category::find($id);
        return $categories;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->name = $request->input('name');
        $category->save();

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }

    public function attachArticle(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        // Crear un nuevo artículo asociado a la categoría
        $article = new Article();
        $article->title = $request->input('title');
        // Otras propiedades del artículo
        $article->category()->associate($category); // Asociar el artículo a la categoría
        $article->save();

        return response()->json($article, 201);
    }

}
