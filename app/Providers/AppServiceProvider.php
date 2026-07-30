<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleContent;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseContent;
use App\Services\PublicContentCacheService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $refreshPublicCache = function () {
            try {
                app(PublicContentCacheService::class)->rebuild();
            } catch (\Throwable $exception) {
                report($exception);
            }
        };

        foreach ([
            Article::class,
            ArticleCategory::class,
            ArticleContent::class,
            Course::class,
            CourseCategory::class,
            CourseContent::class,
        ] as $model) {
            $model::saved($refreshPublicCache);
            $model::deleted($refreshPublicCache);
        }
    }
}
