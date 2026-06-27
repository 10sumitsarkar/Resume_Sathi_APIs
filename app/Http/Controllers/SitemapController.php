<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use App\Models\HtmlSymbol;
use App\Models\ProgramingLanguage;
use App\Models\Sitemap;
use App\Models\Snipit;
use App\Models\SnipitCategory;
use Illuminate\Http\Request;
use Modules\Movies\Entities\Category;
use Modules\Movies\Entities\Movie;

class SitemapController extends Controller
{
    public function index()
    {
        $customs = Sitemap::all();
        $articles = Article::select('canonical_tag', 'updated_at')->where(['is_draft' => 0, "status" => 1, "is_active" => 1])->get();
        $courses = Course::select('canonical_tag', 'updated_at')->where(['is_draft' => 0, "status" => 1, "is_active" => 1])->get();
        $snipits = Snipit::select('canonical_tag', 'updated_at')->where(['is_draft' => 0, "status" => 1, "is_active" => 1])->get();
        $movies = Movie::select('canonical_tag', 'updated_at')->where(['is_draft' => 0, "status" => 1, "is_active" => 1])->get();
        $symbols = HtmlSymbol::select('canonical_tag', 'updated_at')->where('is_active', 1)->get();
        $tutorials = ProgramingLanguage::select('url_name', 'updated_at')->get();
        $snipit_categories = SnipitCategory::select('url_name', 'updated_at')->get();
        $movie_categories = Category::select('url_name', 'updated_at')->get();  // movie categories
        return response()->view('sitemap', compact('customs', 'articles', 'courses', 'snipits', 'movies', 'symbols', 'tutorials', 'snipit_categories', 'movie_categories'))->header('Content-Type', 'text/xml');
    }

    public function sitemapUrls()
    {
        $urls = Sitemap::all();
        return view('backend.pages.sitemap.index', compact('urls'));
    }

    public function createSitemap(Request $request)
    {
        if ($request->isMethod('post')) {
            $exist = Sitemap::where('slug', $request->slug)->first();
            if (!$exist) {
                $response = Sitemap::create(['slug' => $request->slug, 'priority' => $request->priority]);
                if ($response) {
                    $msg = "Slug added successfully!";
                    return redirect(route('sitemap-urls'))->with('success', strtoupper($msg));
                } else {
                    $msg = "Something went wrong! ";
                    return redirect()->back()->with('danger', strtoupper($msg));
                }
            } else {
                return redirect()->back()->with('fail', strtoupper('Slug is aleady exist.'));
            }
        }
        return view('backend.pages.sitemap.create');
    }

    public function editSitemap(Request $request, $id)
    {
        $sitemap = Sitemap::find($id);
        if (!$sitemap) {
            $msg = "Something went wrong! ";
            return redirect()->back()->with('danger', strtoupper($msg));
        }

        if ($request->isMethod('post')) {
            $sitemap->slug = $request->slug;
            $sitemap->priority = $request->priority;
            $sitemap->save();
            return redirect(route('sitemap-urls'))->with('success', strtoupper('Slug updated successfully!'));
        }
        return view('backend.pages.sitemap.edit', compact('sitemap'));
    }

    function deleteSitemapSlug($id)
    {
        $response = Sitemap::where('id', $id)->delete();
        if ($response) {
            $msg = "Symbol deleted successfully!";
            return redirect(route('sitemap-urls'))->with('success', strtoupper($msg));
        } else {
            $msg = "Something went wrong! ";
            return redirect()->back()->with('danger', strtoupper($msg));
        }
    }
}
