<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Support\Facades\File;

class PublicContentCacheService
{
    public const DIRECTORY = 'content-cache';

    public function rebuild(): array
    {
        $articles = $this->articles();
        $jobs = $this->jobs();
        $articleCategories = ArticleCategory::orderBy('id')->get();
        $jobCategories = CourseCategory::orderBy('id')->get();

        $this->writeJson('articles.json', $articles);
        $this->writeJson('jobs.json', $jobs);
        $this->writeJson('article-categories.json', $articleCategories);
        $this->writeJson('job-categories.json', $jobCategories);
        $this->writeJson('manifest.json', [
            'generated_at' => now()->toISOString(),
            'articles' => $articles->count(),
            'jobs' => $jobs->count(),
            'article_categories' => $articleCategories->count(),
            'job_categories' => $jobCategories->count(),
        ]);

        return [
            'articles' => $articles->count(),
            'jobs' => $jobs->count(),
            'article_categories' => $articleCategories->count(),
            'job_categories' => $jobCategories->count(),
        ];
    }

    private function articles()
    {
        return Article::with(['user', 'category', 'contents'])
            ->where(['is_draft' => 0, 'status' => 1, 'is_active' => 1])
            ->orderBy('created_at', 'desc')
            ->limit(500)
            ->get();
    }

    private function jobs()
    {
        return Course::with(['user', 'course_category', 'contents'])
            ->where('status', 1)
            ->where(function ($query) {
                $query->where('is_active', 1)->orWhereNull('is_active');
            })
            ->orderBy('created_at', 'desc')
            ->limit(500)
            ->get();
    }

    private function writeJson(string $filename, $data): void
    {
        $directory = public_path(self::DIRECTORY);
        File::ensureDirectoryExists($directory);

        $path = $directory . DIRECTORY_SEPARATOR . $filename;
        $temporaryPath = $path . '.tmp';

        File::put(
            $temporaryPath,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        );
        File::move($temporaryPath, $path);
    }
}
