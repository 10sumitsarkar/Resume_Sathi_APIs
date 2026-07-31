<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use Illuminate\Support\Str;

class DynamicContentController extends Controller
{
    private function siteUrl()
    {
        return rtrim(config('app.frontend_url', env('FRONTEND_URL', 'https://www.resumesathi.com')), '/');
    }

    private function publicUrl($path, $fallback)
    {
        if (!$path) {
            return $fallback;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        return rtrim(url('/'), '/') . '/' . ltrim($path, '/');
    }

    private function slugFrom($value)
    {
        $last = collect(explode('/', (string) $value))->filter()->last();

        return Str::slug($last ?: $value);
    }

    private function activeArticleQuery()
    {
        return Article::with(['category', 'contents', 'user'])
            ->where([
                'is_draft' => 0,
                'is_active' => 1,
                'status' => 1,
            ]);
    }

    private function activeJobQuery()
    {
        return Course::with(['course_category', 'contents', 'user'])
            ->where([
                'is_active' => 1,
                'status' => 1,
            ]);
    }

    public function blog($slug)
    {
        $normalizedSlug = $this->slugFrom($slug);
        $article = $this->activeArticleQuery()
            ->get()
            ->first(function ($item) use ($normalizedSlug) {
                return in_array($normalizedSlug, [
                    $this->slugFrom($item->slug),
                    $this->slugFrom($item->url_name),
                    $this->slugFrom($item->canonical_tag),
                ], true);
            });

        abort_unless($article, 404);

        $canonical = $this->siteUrl() . '/blog/' . $normalizedSlug . '/';
        $image = $this->publicUrl($article->hero_image, $this->siteUrl() . '/front-assets/images/og/blog-og.png');
        $latest = $this->activeArticleQuery()->where('id', '!=', $article->id)->latest()->limit(5)->get();

        return view('frontend.dynamic.blog-detail', compact('article', 'canonical', 'image', 'latest'));
    }

    public function job($slug)
    {
        $normalizedSlug = $this->slugFrom($slug);
        $job = $this->activeJobQuery()
            ->get()
            ->first(function ($item) use ($normalizedSlug) {
                return in_array($normalizedSlug, [
                    $this->slugFrom($item->slug),
                    $this->slugFrom($item->url_name),
                    $this->slugFrom($item->canonical_tag),
                ], true);
            });

        abort_unless($job, 404);

        $canonical = $this->siteUrl() . '/jobs/' . $normalizedSlug . '/';
        $image = $this->publicUrl($job->hero_image, $this->siteUrl() . '/front-assets/images/og/job-og.png');
        $latest = $this->activeJobQuery()->where('id', '!=', $job->id)->latest()->limit(5)->get();

        return view('frontend.dynamic.job-detail', compact('job', 'canonical', 'image', 'latest'));
    }

    public function sitemap()
    {
        $baseUrl = $this->siteUrl();
        $staticUrls = [
            ['loc' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/blog/', 'priority' => '0.95', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/jobs/', 'priority' => '0.95', 'changefreq' => 'daily'],
            ['loc' => $baseUrl . '/resume/', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/', 'priority' => '0.85', 'changefreq' => 'weekly'],
        ];

        $articles = $this->activeArticleQuery()->select(['id', 'slug', 'url_name', 'canonical_tag', 'updated_at', 'created_at'])->get();
        $jobs = $this->activeJobQuery()->select(['id', 'slug', 'url_name', 'canonical_tag', 'updated_at', 'created_at'])->get();

        return response()
            ->view('frontend.dynamic.sitemap', compact('staticUrls', 'articles', 'jobs', 'baseUrl'))
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
