<?php

use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DynamicContentController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Dynamic SEO routes for shared hosting. These pages are rendered from the
// database, so new jobs/blogs do not need a Next static rebuild.
Route::get('sitemap.xml', [DynamicContentController::class, 'sitemap'])->name('dynamic-sitemap');
Route::get('robots.txt', [DynamicContentController::class, 'robots'])->name('dynamic-robots');
Route::middleware('noindex.backend')->group(function () {
    Route::get('jobs/{slug}', [DynamicContentController::class, 'job'])->name('dynamic-job');
    Route::get('blog/{slug}', [DynamicContentController::class, 'blog'])->name('dynamic-blog');
});

Route::middleware('noindex.backend')->group(function () {
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Backend dashboard routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'noindex.backend'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Articles Routes
        Route::get('create-article', [ArticleController::class, 'create_article'])->name('create-article');
        Route::get('articles', [ArticleController::class, 'articles'])->name('articles');
        Route::get('draft-articles', [ArticleController::class, 'draft_articles'])->name('draft_articles');
        Route::match(['get', 'post'], 'save-article/{id}', [ArticleController::class, 'save_article'])->name('save-article');
        Route::get('article-delete/{id}', [ArticleController::class, 'article_delete'])->name('article-delete');
        Route::get('article-status/{id}', [ArticleController::class, 'toggle_status'])->name('article-status');
        Route::get('comments/article/{id}', [ArticleController::class, 'postComment'])->name('article-comment');

        // Article Comments
        Route::get('article/comments', [ArticleCommentController::class, 'index'])->name('article-comments');
        Route::get('article/comments/{id}', [ArticleCommentController::class, 'destroy'])->name('article-comment-delete');

        // Course Routes
        Route::get('create-course', [CourseController::class, 'create_course'])->name('create-course');
        Route::get('courses', [CourseController::class, 'courses'])->name('courses');
        Route::get('course-category', [CourseController::class, 'courses_category'])->name('courses-category');
        Route::get('draft-courses', [CourseController::class, 'draft_courses'])->name('draft_courses');
        Route::match(['get', 'post'], 'save-course/{id}', [CourseController::class, 'save_course'])->name('save-course');
        Route::get('course-delete/{id}', [CourseController::class, 'course_delete'])->name('course-delete');
        Route::get('course-status/{id}', [CourseController::class, 'toggle_status'])->name('course-status');
        Route::get('course-category-delete/{id}', [CourseController::class, 'course_category_delete'])->name('course-category-delete');
        Route::match(['get', 'post'], 'course-category-edit/{id}', [CourseController::class, 'course_category_edit'])->name('course-category-edit');
        Route::match(['get', 'post'], 'add-course-category', [CourseController::class, 'add_course_category'])->name('add-course-category');

        //Attachment
        Route::post('upload-attachment', [DashboardController::class, 'upload_attachment'])->name('upload-attachment');
        Route::post('delete-attachment', [DashboardController::class, 'delete_attachment'])->name('delete-attachment');

        // Other routes
        Route::get('subscribers', [DashboardController::class, 'subscribersList'])->name('subscribers');
        Route::get('contact-us-list', [DashboardController::class, 'ContactUS'])->name('contactus');
        Route::get('subscriber-delete/{id}', [DashboardController::class, 'subscriberDelete'])->name('subscriber-delete');
        Route::get('contact-us-delete/{id}', [DashboardController::class, 'contactUsDelete'])->name('contact-us-delete');

        // sitemaps
        Route::get('sitemap-urls', [SitemapController::class, 'sitemapUrls'])->name('sitemap-urls');
        Route::match(['get', 'post'], 'create-sitemap', [SitemapController::class, 'createSitemap'])->name('create-sitemap');
        Route::match(['get', 'post'], 'edit-sitemap/{id}', [SitemapController::class, 'editSitemap'])->name('edit-sitemap');
        Route::get('sitemap-slug-delete/{id}', [SitemapController::class, 'deleteSitemapSlug'])->name('sitemap-slug-delete');
    });
});

/*
|--------------------------------------------------------------------------
| API-only fallback
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->json([
        'message' => 'API endpoint not found',
    ], 404);
});
