<?php

namespace Modules\Movies\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Movies\Entities\BookLink;
use Modules\Movies\Entities\Category;
use Modules\Movies\Entities\Genre;
use Modules\Movies\Entities\Language;
use Modules\Movies\Entities\Movie;
use Modules\Movies\Entities\MovieContent;
use Modules\Movies\Entities\MovieDubbed;
use Modules\Movies\Entities\MovieGenre;
use Modules\Movies\Entities\MovieLanguage;
use Modules\Movies\Entities\Platform;
use Modules\Movies\Entities\WatchLink;

class MovieDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $movies = Movie::where(['is_draft' => 0, "status" => 1])->orderBy('id', 'desc')->get();
        return view('movies::backend.movie.list', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $user_id = Auth::user()->id;

        $movie = Movie::where(['is_draft' => 1, 'created_by' => $user_id])->first();

        if (!$movie) {
            $movie = Movie::create(['is_draft' => 1, 'created_by' => $user_id, 'status' => 0]);
        }

        return redirect(route('admin-movie-save', base64_encode($movie->id)));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $encrypt_id)
    {
        if ($request->isMethod('post')) {
            $movie_id = $request->movie_id;
            $name = $request->name;
            $title = $request->meta_title;
            $book_link = $request->book_link;
            $watch_link = $request->watch_link;
            $watch_platform = $request->watch_platform_id;
            $book_link = $request->book_link;
            $book_platform = $request->book_platform_id;
            $description = $request->meta_description;
            $keyword = $request->meta_keyword;
            $url_title = $request->url_name;
            $editordata = $request->editordata;
            $category_id = $request->category_id;
            $languages = $request->language;
            $dub_languages = $request->dub_languages;
            $genres = $request->genres;
            $is_active = $request->is_active;
            $is_draft = $request->is_draft;
            $canonical_tag = "movies/view/" . $url_title;

            if ($request->file('image') !== null) {
                $file = $request->file('image');
                $path = 'movies_image';
                $img_name = 'file_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($path), $img_name);
                $imagePath = $path . '/' . $img_name;
                $update = ["hero_image" => $imagePath];
                Movie::where('id', $movie_id)->update($update);
            }

            $update = [
                'name' => $name,
                'url_name' => $url_title,
                'description' => $request->description,
                'meta_title' => $title,
                'label' => $request->label,
                'casts' => $request->casts,
                'duration' => $request->duration,
                'release_date' => $request->release_date,
                "seasion" => $request->seasion,
                "audience_type" => $request->audience_type,
                "writer" => $request->writer,
                "cinematography" => $request->cinematography,
                "music" => $request->music,
                "producer" => $request->producer,
                "production" => $request->production,
                "certificate" => $request->certificate,
                'director' => $request->director,
                'meta_description' => $description,
                'meta_keyword' => $keyword,
                'canonical_tag' => $canonical_tag,
                'category_id' => $category_id,
                "status" => 1,
            ];

            MovieLanguage::updateLanguage($languages ?? [], $movie_id); // update movie languages
            MovieDubbed::updateDubbing($dub_languages ?? [], $movie_id); // update movie dub languages
            MovieGenre::updateGenre($genres ?? [], $movie_id); // update movie genres

            if ($is_active) {
                $update['is_active'] = 1;
            } else {
                $update['is_active'] = 0;
            }

            if ($is_draft) {
                $update['is_draft'] = 1;
            } else {
                $update['is_draft'] = 0;
            }


            // update watch link detail
            $watch = WatchLink::where('movie_id', $movie_id)->first();

            if ($watch) {
                $response = $watch->update(['link' => $watch_link, 'platform_id' => $watch_platform]);
            } else {
                $response = WatchLink::create(['link' => $watch_link, 'platform_id' => $watch_platform, 'movie_id' => $movie_id]);
            }

            // update watch link detail
            $book = BookLink::where('movie_id', $movie_id)->first();

            if ($book) {
                $response = $book->update(['link' => $book_link, 'platform_id' => $book_platform]);
            } else {
                $response = BookLink::create(['link' => $book_link, 'platform_id' => $book_platform, 'movie_id' => $movie_id]);
            }


            // update movie content
            $movie_content = MovieContent::where('movie_id', $movie_id)->first();

            if ($movie_content) {
                $response = $movie_content->update(['content' => $editordata]);
            } else {
                $response = MovieContent::create(['movie_id' => $movie_id, 'content' => $editordata]);
            }

            $response = Movie::where('id', $movie_id)->update($update);
            if ($response) {
                $msg = "Post Saved successfully! ";
                return redirect()->back()->with('success', strtoupper($msg));
            } else {
                $msg = "Post Saved failed! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        $movie_id = base64_decode($encrypt_id);
        $movie = Movie::with('content', 'watchlink', 'booklink', 'attachments')->find($movie_id);

        if (!$movie) {
            return view('error.error-500');
        }
        $movies_category = Category::all();
        $languages = Language::all();
        $genres = Genre::all();
        $platforms = Platform::all();
        return view('movies::backend.movie.create', compact('movies_category', 'languages', 'genres', 'platforms', 'movie'));
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('movies::show');
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
        $response =  Movie::find($id)->delete();
        MovieContent::where('movie_id', $id)->delete();

        if ($response) {
            $msg = "Movie deleted successfully!";
            $status = 'success';
        } else {
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }
}
