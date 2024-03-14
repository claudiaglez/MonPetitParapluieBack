<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Exception;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $articles = Article::all();
            return response()->json(['status' => 200, 'data' => $articles]);
        } catch (Exception $e) {
            return response()->json(['status' => 204, 'message' => $e->getMessage()], 204);
        }
    }

    public function show($id)
    {
        $article = Article::find($id);

        if ($article) {
            return response()->json(['article' => $article], 200);
        } else {
            return response()->json(['error' => 'Artículo no encontrado'], 404);
        }
    }

    
    }




