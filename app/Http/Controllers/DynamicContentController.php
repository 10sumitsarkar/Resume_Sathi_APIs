<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use App\Models\Sitemap;
use Illuminate\Support\Facades\Schema;
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

    private function contentSlug($item)
    {
        foreach (['slug', 'url_name', 'canonical_tag'] as $field) {
            $slug = $this->slugFrom($item->{$field} ?? '');
            if ($slug) {
                return $slug;
            }
        }

        return '';
    }

    private function sitemapColumns($table)
    {
        $columns = ['id', 'url_name', 'canonical_tag', 'updated_at', 'created_at'];
        if (Schema::hasColumn($table, 'slug')) {
            $columns[] = 'slug';
        }

        return $columns;
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
            ['loc' => $baseUrl . '/resume/resume-type/', 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/upload-resume/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/personal-info/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/education/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/work-experience/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/skill/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/summary/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/language/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/certificate/', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/internship/', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/social-media/', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/hobbie/', 'priority' => '0.68', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/select-theme/', 'priority' => '0.78', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/resume/preview/', 'priority' => '0.65', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/', 'priority' => '0.85', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/ats-checker/', 'priority' => '0.82', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/merge-pdf/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/split-pdf/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/pdf-remove/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/pdf-compressor/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/docx-to-pdf/', 'priority' => '0.78', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/image-to-pdf/', 'priority' => '0.78', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/signature-cropper/', 'priority' => '0.76', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/age-calculator/', 'priority' => '0.76', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/gradient-generator/', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/tools/css-animations/', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/typing/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/typing/practice/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/typing/learn/', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/typing/learn/lesson/', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/typing/stats/', 'priority' => '0.72', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/about/', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/contact/', 'priority' => '0.65', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/privacy-policy/', 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl . '/terms-and-conditions/', 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl . '/disclaimer/', 'priority' => '0.5', 'changefreq' => 'yearly'],
        ];

        $customUrls = Sitemap::query()->select(['slug', 'priority', 'updated_at', 'created_at'])->get();
        $articles = Article::query()
            ->where([
                'is_draft' => 0,
                'status' => 1,
            ])
            ->where(function ($query) {
                $query->where('is_active', 1)->orWhereNull('is_active');
            })
            ->select($this->sitemapColumns('articles'))
            ->latest('updated_at')
            ->get();
        $jobs = Course::query()
            ->where('status', 1)
            ->where(function ($query) {
                $query->where('is_active', 1)->orWhereNull('is_active');
            })
            ->select($this->sitemapColumns('jobs'))
            ->latest('updated_at')
            ->get();

        return response()
            ->view('frontend.dynamic.sitemap', [
                'staticUrls' => collect($staticUrls)->unique('loc')->values(),
                'customUrls' => $customUrls,
                'articles' => $articles,
                'jobs' => $jobs,
                'baseUrl' => $baseUrl,
                'slugger' => fn ($item) => $this->contentSlug($item),
            ])
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    public function robots()
    {
        $baseUrl = $this->siteUrl();
        $content = implode("\n", [
            'User-agent: *',
            'Disallow: /admin/',
            'Disallow: /api/',
            'Disallow: /login',
            'Disallow: /logout',
            'Disallow: /jobs/',
            'Disallow: /blog/',
            'Disallow: /storage/',
            'Disallow: /dashboard-assets/',
            'Allow: /sitemap.xml',
            'Sitemap: ' . $baseUrl . '/sitemap.xml',
            '',
        ]);

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8')
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
