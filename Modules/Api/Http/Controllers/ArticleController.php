<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'attachments', 'contents'])->get();
        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::with(['category', 'attachments', 'contents'])->findOrFail($id);
        return response()->json($article);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:article_categories,id',
            'status' => 'required|in:draft,published',
        ]);

        $article = Article::create($validated);
        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:articles,slug,' . $id,
            'description' => 'nullable|string',
            'category_id' => 'sometimes|exists:article_categories,id',
            'status' => 'sometimes|in:draft,published',
        ]);

        $article->update($validated);
        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(null, 204);
    }
} 