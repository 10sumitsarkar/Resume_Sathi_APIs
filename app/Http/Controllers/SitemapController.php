<?php

namespace App\Http\Controllers;

use App\Models\Sitemap;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
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
