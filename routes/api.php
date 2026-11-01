<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PublicContentController;
use App\Http\Controllers\BackgroundRemovalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('noindex.backend')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/pdf/compress', [PdfController::class, 'compress']);
    Route::get('/pdf/download/{file}', [PdfController::class, 'download']);
    Route::post('/image/remove-background', [BackgroundRemovalController::class, 'remove']);

    Route::get('/articles', [PublicContentController::class, 'articles']);
    Route::get('/articles/latest', [PublicContentController::class, 'latestArticles']);
    Route::get('/articles/slug/{slug}', [PublicContentController::class, 'articleBySlug']);
    Route::get('/article-categories', [PublicContentController::class, 'articleCategories']);
    Route::get('/article-comments', [PublicContentController::class, 'articleComments']);
    Route::post('/article-comments', [PublicContentController::class, 'storeArticleComment']);
    Route::get('/exam-guides', [PublicContentController::class, 'examGuides']);
    Route::get('/exam-guides/latest', [PublicContentController::class, 'latestExamGuides']);
    Route::get('/exam-guides/slug/{slug}', [PublicContentController::class, 'examGuideBySlug']);
    Route::get('/exam-guide-comments', [PublicContentController::class, 'examGuideComments']);
    Route::post('/exam-guide-comments', [PublicContentController::class, 'storeExamGuideComment']);
    Route::get('/courses', [PublicContentController::class, 'courses']);
    Route::get('/courses/latest', [PublicContentController::class, 'latestCourses']);
    Route::get('/courses/slug/{slug}', [PublicContentController::class, 'courseBySlug']);
    Route::get('/course-categories', [PublicContentController::class, 'courseCategories']);
    Route::post('/contact', [PublicContentController::class, 'storeContact']);
    Route::post('/subscribers', [PublicContentController::class, 'storeSubscriber']);
    Route::get('/newsletter/unsubscribe/{subscriber}', [\App\Http\Controllers\NewsletterUnsubscribeController::class, 'confirm'])
        ->middleware('signed:relative')
        ->name('newsletter.unsubscribe.confirm');
    Route::post('/newsletter/unsubscribe/{subscriber}', [\App\Http\Controllers\NewsletterUnsubscribeController::class, 'unsubscribe'])
        ->middleware('signed:relative')
        ->name('newsletter.unsubscribe.one-click');
    Route::match(['get', 'post'], '/public-cache/rebuild', [PublicContentController::class, 'rebuildCache']);
    Route::get('/public-cache/{filename}', [PublicContentController::class, 'cacheFile'])
        ->where('filename', 'articles\.json|jobs\.json|article-categories\.json|job-categories\.json|manifest\.json');
});
