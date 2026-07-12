<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\WhiteBoardController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Compilers\Compiler;

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


// Notification routes
Route::get('notification', [NotificationController::class, 'notification'])->name('notification');
Route::get('notification2', [NotificationController::class, 'notification2'])->name('notification2');
Route::get('notification3', [NotificationController::class, 'notification3'])->name('notification3');
Route::post('store-token', [NotificationController::class, 'storeToken'])->name('store.token');
Route::post('send-notification', [NotificationController::class, 'send_notification'])->name('send-notification');
Route::post('device-send-notification', [NotificationController::class, 'device_send_notification'])->name('device-send-notification');

// Tool routes
Route::get('pincode-details', [FrontController::class, 'pincode_details'])->name('pincode-details');
Route::get('pdf-to-text', [FrontController::class, 'pdf_to_text'])->name('pdf-to-text');
Route::get('case-converter', [FrontController::class, 'case_converter'])->name('case-converter');
Route::get('css-minifier', [FrontController::class, 'css_minifier'])->name('css-minifier');
Route::get('age-calculator', [FrontController::class, 'age_calculator'])->name('age-calculator');
Route::get('white-board', [WhiteBoardController::class, 'white_board'])->name('white-board');
Route::get('gradient-maker', [FrontController::class, 'gradient_maker'])->name('gradient-maker');
Route::get('px-to-rem-converter', [FrontController::class, 'px_to_rem_converter'])->name('px-to-rem-converter');
Route::get('rem-to-px-converter', [FrontController::class, 'rem_to_px_converter'])->name('rem-to-px-converter');
Route::get('px-to-em-converter', [FrontController::class, 'px_to_em_converter'])->name('px-to-em-converter');
Route::get('em-to-px-converter', [FrontController::class, 'em_to_px_converter'])->name('em-to-px-converter');
Route::get('webp-converter', [FrontController::class, 'webp_converter'])->name('webp-converter');

// Play ground route
Route::get('coding-play-ground', [FrontController::class, 'coding_play_ground'])->name('coding-play-ground');

// Frontend content routes
Route::get('our-tutorials/{url?}', [FrontController::class, 'our_tutorials'])->name('our-tutorials');
Route::get('code-snipits/{url?}', [FrontController::class, 'code_snipits'])->name('code-snipits');
Route::get('about-us', [FrontController::class, 'about_us'])->name('about-us');
Route::match(['get', 'post'], 'contact-us', [FrontController::class, 'contact_us'])->name('contact-us');
Route::get('privacy-policy', [FrontController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('disclaimer', [FrontController::class, 'disclaimer'])->name('disclaimer');
Route::get('terms-and-conditions', [FrontController::class, 'terms_and_conditions'])->name('terms-and-conditions');

// CSS Tools
Route::get('dev/animate-preview', [FrontController::class, 'animate_preview_tool'])->name('animate-preview');

// Resume routes
Route::get('free-resume-builder', [FrontController::class, 'free_resume_builder'])->name('free-resume-builder');
Route::get('resume', [FrontController::class, 'my_resume'])->name('resume');
Route::get('template1', [FrontController::class, 'template1'])->name('template1');
Route::get('template2', [FrontController::class, 'template2'])->name('template2');
Route::get('template3', [FrontController::class, 'template3'])->name('template3');
Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Backend dashboard routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Analytics Routes
        Route::get('analytics/articles', [AnalyticsController::class, 'articles'])->name('article-analytics');

        // Articles Routes
        Route::get('create-article', [ArticleController::class, 'create_article'])->name('create-article');
        Route::get('articles', [ArticleController::class, 'articles'])->name('articles');
        Route::get('draft-articles', [ArticleController::class, 'draft_articles'])->name('draft_articles');
        Route::match(['get', 'post'], 'save-article/{id}', [ArticleController::class, 'save_article'])->name('save-article');
        Route::get('article-delete/{id}', [ArticleController::class, 'article_delete'])->name('article-delete');
        Route::get('comments/article/{id}', [ArticleController::class, 'postComment'])->name('article-comment');

        // Article Comments
        Route::get('article/comments', [ArticleCommentController::class, 'index'])->name('article-comments');
        Route::get('article/comments/{id}', [ArticleCommentController::class, 'destroy'])->name('article-comment-delete');

        // Tutorial Routes
        Route::get('tutorials', [ArticleController::class, 'tutorials'])->name('tutorials');
        Route::match(['get', 'post'], 'add-tutorial', [ArticleController::class, 'add_tutorial'])->name('add-tutorial');
        Route::match(['get', 'post'], 'tutorial-edit/{id}', [ArticleController::class, 'tutorial_edit'])->name('tutorial-edit');
        Route::get('tutorial-delete/{id}', [ArticleController::class, 'tutorial_delete'])->name('tutorial-delete');

        // Course Routes
        Route::get('create-course', [CourseController::class, 'create_course'])->name('create-course');
        Route::get('courses', [CourseController::class, 'courses'])->name('courses');
        Route::get('course-category', [CourseController::class, 'courses_category'])->name('courses-category');
        Route::get('draft-courses', [CourseController::class, 'draft_courses'])->name('draft_courses');
        Route::match(['get', 'post'], 'save-course/{id}', [CourseController::class, 'save_course'])->name('save-course');
        Route::get('course-delete/{id}', [CourseController::class, 'course_delete'])->name('course-delete');
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

        // Errors
        Route::get('errors', [DashboardController::class, 'errorsList'])->name('errors');
        Route::get('error-report-delete/{id}', [DashboardController::class, 'errorDelete'])->name('error-report-delete');
        Route::get('change-error-report-status/{id}', [DashboardController::class, 'changeStatus'])->name('change-error-report-status');

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
