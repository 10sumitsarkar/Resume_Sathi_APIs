<?php

namespace Modules\Movies\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Movies\Entities\Category;
use Modules\Movies\Entities\Language;
use Modules\Movies\Entities\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $category = null)
    {
        $condition = ['is_draft' => 0, 'is_active' => 1];
        $categories = Category::where(['is_active' => 1])->orderBy('ordering', 'asc')->get();
        $category_id = null;

        if ($category) {
            $detail =  Category::where(['url_name' => $category])->first();
            if ($detail) {
                $category_id = $detail->id;
            }
        }

        if (!$category_id && count($categories)) {
            $category_id = $categories[0]->id;
        }

        $condition['category_id'] = $category_id;
        $movies = Movie::where($condition)->orderBy('release_date', 'desc')->get();
        $upcomingMovies = Movie::where($condition)->orderBy('release_date', 'asc')->get();
        $popular = Movie::where(['is_draft' => 0, 'is_active' => 1])->orderBy('pageview', 'desc')->limit(4)->get();
        $upcoming = Movie::where(['is_draft' => 0, 'is_active' => 1])->whereDate('release_date', '>', today())->orderBy('release_date', 'desc')->limit(4)->get();

        return view('movies::index', compact('movies', 'upcomingMovies', 'categories', 'category_id', 'popular', 'upcoming'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('movies::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        $categories = Category::where(['is_active' => 1])->orderBy('ordering', 'asc')->get();
        $canonical_tag = 'movies/view/' . $slug;
        $movie = Movie::where(['is_draft' => 0, 'is_active' => 1, 'canonical_tag' => $canonical_tag])->first();
        if (!$movie) {
            return view('error.error-400');
        }
        $movie->addView();
        $popular = Movie::where(['is_draft' => 0, 'is_active' => 1])->orderBy('pageview', 'desc')->limit(4)->get();
        $upcoming = Movie::where(['is_draft' => 0, 'is_active' => 1])->whereDate('release_date', '>', today())->orderBy('release_date', 'desc')->limit(4)->get();
        return view('movies::show', compact('movie', 'categories', 'popular', 'upcoming'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('movies::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
