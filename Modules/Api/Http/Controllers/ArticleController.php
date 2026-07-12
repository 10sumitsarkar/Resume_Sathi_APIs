<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['category', 'attachments', 'contents'])
            ->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0]);

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $like = "%{$search}%";

            $query->where(function ($subQuery) use ($like) {
                $subQuery->where('article_title', 'like', $like)
                    ->orWhere('meta_title', 'like', $like)
                    ->orWhere('meta_description', 'like', $like)
                    ->orWhere('meta_keyword', 'like', $like)
                    ->orWhere('canonical_tag', 'like', $like)
                    ->orWhere('url_name', 'like', $like)
                    ->orWhereHas('contents', function ($contentQuery) use ($like) {
                        $contentQuery->where('content', 'like', $like);
                    })
                    ->orWhereHas('category', function ($categoryQuery) use ($like) {
                        $categoryQuery->where('article_name', 'like', $like)
                            ->orWhere('article_description', 'like', $like);
                    });
            });
        }

        if ($request->filled('category_id')) {
            $query->where('article_type', $request->input('category_id'));
        }

        $query->orderByDesc('created_at');

        $limit = min(max(intval($request->input('limit', 10)), 1), 50);
        $page = max(intval($request->input('page', 1)), 1);
        $query->skip(($page - 1) * $limit)->take($limit);

        $articles = $query->get();
        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::with(['category', 'attachments', 'contents', 'comments', 'user', 'language'])
            ->findOrFail($id);
        return response()->json($article);
    }

    public function showBySlug($slug)
    {
        $article = Article::with(['category', 'attachments', 'contents', 'comments', 'user', 'language'])
            ->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])
            ->where(function ($query) use ($slug) {
                $query->where('url_name', $slug)
                    ->orWhere('canonical_tag', $slug);
            })
            ->firstOrFail();

        return response()->json($article);
    }

    public function latest(Request $request)
    {
        $limit = intval($request->input('limit', 5));
        $articles = Article::with(['category'])
            ->where(['is_active' => 1, 'status' => 1, 'is_draft' => 0])
            ->orderByDesc('created_at')
            ->limit($limit)
            ->get();

        return response()->json($articles);
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
