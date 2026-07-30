<?php

use App\Http\Controllers\WhiteBoardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PublicContentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('upload-board-file', [WhiteBoardController::class, 'upload_board_file'])->name('upload-board-file');

Route::post('/pdf/compress', [PdfController::class, 'compress']);
Route::get('/pdf/download/{file}', [PdfController::class, 'download']);

Route::get('/articles', [PublicContentController::class, 'articles']);
Route::get('/articles/latest', [PublicContentController::class, 'latestArticles']);
Route::get('/articles/slug/{slug}', [PublicContentController::class, 'articleBySlug']);
Route::get('/article-categories', [PublicContentController::class, 'articleCategories']);
Route::get('/article-comments', [PublicContentController::class, 'articleComments']);
Route::post('/article-comments', [PublicContentController::class, 'storeArticleComment']);
Route::get('/courses', [PublicContentController::class, 'courses']);
Route::get('/course-categories', [PublicContentController::class, 'courseCategories']);
Route::match(['get', 'post'], '/public-cache/rebuild', [PublicContentController::class, 'rebuildCache']);
Route::get('/public-cache/{filename}', [PublicContentController::class, 'cacheFile'])
    ->where('filename', 'articles\.json|jobs\.json|article-categories\.json|job-categories\.json|manifest\.json');
Route::get('/pdf/download/{file}', [PdfController::class, 'download']);
