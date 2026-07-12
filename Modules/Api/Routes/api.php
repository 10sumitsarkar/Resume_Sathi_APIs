<?php

use Illuminate\Support\Facades\Route;
use Modules\Api\Http\Controllers\ArticleController;
use Modules\Api\Http\Controllers\ArticleCommentController;
use Modules\Api\Http\Controllers\CourseController;
use Modules\Api\Http\Controllers\CategoryController;
use Modules\Api\Http\Controllers\ContactController;
use Modules\Api\Http\Controllers\SubscriberController;
use Modules\Api\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['api']], function () {
    // Articles
    Route::get('articles/slug/{slug}', [ArticleController::class, 'showBySlug']);
    Route::get('articles/latest', [ArticleController::class, 'latest']);
    Route::apiResource('articles', ArticleController::class);

    // Comments
    Route::get('article-comments', [ArticleCommentController::class, 'index']);
    Route::post('article-comments', [ArticleCommentController::class, 'store']);

    // Courses
    Route::apiResource('courses', CourseController::class);

    // Categories
    Route::apiResource('article-categories', CategoryController::class);
    Route::apiResource('course-categories', CategoryController::class);
    Route::apiResource('snipit-categories', CategoryController::class);

    // Contact
    Route::post('contact', [ContactController::class, 'store'])->name('api.contact.store');

    // Subscribers
    Route::post('subscribers', [SubscriberController::class, 'store'])->name('api.subscribers.store');

    // Users
    Route::apiResource('users', UserController::class);

});
