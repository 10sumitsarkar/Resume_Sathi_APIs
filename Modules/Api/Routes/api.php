<?php

use Illuminate\Support\Facades\Route;
use Modules\Api\Http\Controllers\ArticleController;
use Modules\Api\Http\Controllers\CourseController;
use Modules\Api\Http\Controllers\SnipitController;
use Modules\Api\Http\Controllers\CategoryController;
use Modules\Api\Http\Controllers\ContactController;
use Modules\Api\Http\Controllers\ProgrammingLanguageController;
use Modules\Api\Http\Controllers\SubscriberController;
use Modules\Api\Http\Controllers\UserController;
use Modules\Api\Http\Controllers\HtmlSymbolController;
use Modules\Api\Http\Controllers\HtmlSymbolCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['api']], function () {
    // Articles
    Route::apiResource('articles', ArticleController::class);
    
    // Courses
    Route::apiResource('courses', CourseController::class);
    
    // Snipits
    Route::apiResource('snipits', SnipitController::class);
    
    // Categories
    Route::apiResource('article-categories', CategoryController::class);
    Route::apiResource('course-categories', CategoryController::class);
    Route::apiResource('snipit-categories', CategoryController::class);
    
    // Programming Languages
    Route::apiResource('programming-languages', ProgrammingLanguageController::class);
    
    // Contact
    Route::post('contact', [ContactController::class, 'store'])->name('api.contact.store');
    
    // Subscribers
    Route::post('subscribers', [SubscriberController::class, 'store'])->name('api.subscribers.store');
    
    // Users
    Route::apiResource('users', UserController::class);

    // HTML Symbols
    Route::apiResource('html-symbols', HtmlSymbolController::class);
    Route::apiResource('html-symbol-categories', HtmlSymbolCategoryController::class);
}); 