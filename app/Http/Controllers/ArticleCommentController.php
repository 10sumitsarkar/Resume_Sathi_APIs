<?php

namespace App\Http\Controllers;

use App\Models\ArticleComment;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class ArticleCommentController extends Controller
{
    public function index()
    {
        // return a list of all comments
        $comments = ArticleComment::with('article')->orderByDesc('id')->get();
        return view('backend.pages.article-comments.list', compact('comments'));
    }

    public function show($id)
    {
        // return a all comments with the given article ID
        $comments = ArticleComment::where(['article_id' => $id, 'is_public' => 1])->get();
        $contents = view('frontend.pages.components.article-comments', ['comments' => $comments])->render();
        return response()->json(['html' => $contents, 'total' => count($comments)], 200);
    }

    public function store(Request $request)
    {
        // create a new comment
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required',
            'article_id' => 'required|exists:articles,id',
        ]);

        $comment = [
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'article_id' => $request->article_id,
            'user_ip' => $request->ip(),
        ];

        $ip = $request->ip(); /* Static IP address */
        // $ip = '152.58.155.18';

        $location = Location::get($ip);

        if ($location) {
            $comment['country'] = $location->countryName;
            $comment['state'] = $location->regionName;
            $comment['city'] = $location->cityName;
        }

        ArticleComment::create($comment);
        $comments = ArticleComment::where(['article_id' => $request->article_id, 'is_public' => 1])->get();
        $contents = view('frontend.pages.components.article-comments', ['comments' => $comments])->render();
        return response()->json(['html' => $contents, 'total' => count($comments)], 200);
    }

    public function update(Request $request, $id)
    {
        // update an existing user with the given ID
    }

    public function destroy($id)
    {
        // delete a user with the given ID
        $response =  ArticleComment::find($id)->delete();

        if($response){
            $msg = "Comment deleted successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }
}
