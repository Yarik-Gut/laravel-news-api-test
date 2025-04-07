<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function byCategory($id)
    {
        $articles = Article::where('category_id', $id)
            ->select('id', 'title', 'photo', 'text', 'likes', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $articles->getCollection()->transform(function ($article) {
            $article->short_text = mb_substr(strip_tags($article->text), 0, 100) . '...';
            unset($article->text);
            return $article;
        });

        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::select('id', 'title', 'photo', 'text', 'likes', 'created_at')
            ->findOrFail($id);

        return response()->json($article);
    }
}
