<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);

        $comments = ArticleComment::where('article_id', $request->article_id)
            ->where('is_public', 1)
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'comments' => $comments,
            'total' => $comments->count(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ]);

        $commentData = [
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'article_id' => $request->article_id,
            'user_ip' => $request->ip(),
            'is_public' => 1,
        ];

        $comment = ArticleComment::create($commentData);

        return response()->json($comment, 201);
    }
}
