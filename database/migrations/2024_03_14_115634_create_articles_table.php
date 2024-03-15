<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $articles = Article::all();
            return response()->json(['status' => 200, 'data' => $articles]);
        } catch (Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $article = Article::find($id);

        if ($article) {
            return response()->json(['status' => 200, 'data' => $article]);
        } else {
            return response()->json(['status' => 404, 'message' => 'Artículo no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image_url' => 'required|string',
            'description' => 'required|string',
            'categories_id' => 'required|exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()], 400);
        }

        try {
            $article = Article::create([
                'title' => $request->title,
                'image_url' => $request->image_url,
                'description' => $request->description,
                'categories_id' => $request->categories_id
            ]);

            return response()->json(['status' => 201, 'data' => $article], 201);
        } catch (Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'image_url' => 'string',
            'description' => 'string',
            'categories_id' => 'exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()], 400);
        }

        $article = Article::find($id);

        if (!$article) {
            return response()->json(['status' => 404, 'message' => 'Artículo no encontrado'], 404);
        }

        try {
            $article->update($request->all());
            return response()->json(['status' => 200, 'data' => $article]);
        } catch (Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['status' => 404, 'message' => 'Artículo no encontrado'], 404);
        }

        try {
            $article->delete();
            return response()->json(['status' => 204], 204);
        } catch (Exception $e) {
            return response()->json(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }
}
