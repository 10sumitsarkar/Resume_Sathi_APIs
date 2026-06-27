<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PageView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function articles(Request $request)
    {
        $created_at = '';
        $from_date = '';
        $to_date = '';

        $today = Carbon::now();
        if ($request->date) {
            $created_at = Carbon::parse($request->date)->toDateTimeString();
        } else {
            if ($request->sort) {
                $to_date = $today->toDateTimeString();
                $from_date = Carbon::now()->subDays($request->sort)->toDateTimeString();
            } else {
                $created_at = $today;
            }
        }

        $articles = PageView::select('id', 'post_id', 'created_at')->where('post_category', 1)
            ->where(function ($query) use ($created_at) {
                if ($created_at != '') {
                    $query->whereDate('created_at', '=', $created_at);
                }
            })
            ->where(function ($query) use ($from_date) {
                if ($from_date != '') {
                    $query->where('created_at', '>=', $from_date);
                }
            })
            ->where(function ($query) use ($to_date) {
                if ($to_date != '') {
                    $query->where('created_at', '<=', $to_date);
                }
            })
            ->get()->groupBy('post_id');
        $articles = $articles->map(function ($item, $key) {
            $title = Article::select('language_id', 'id', 'article_title')->with('language')->whereId($key)->first();
            $arr = [];
            if($title){
                $arr['id'] =  $title->id;
                $arr['name'] =  $title->article_title;
                $arr['language'] =  $title->language ? $title->language->title : "none";
                $arr['views'] = count($item);
            }

            return $arr;
        });

        $array = [];
        foreach ($articles as $k => $v) {
            array_push($array, $v);
        }
        $articles = $array;

        return view('backend.pages.analytics.articles', compact('articles'));
    }
}
