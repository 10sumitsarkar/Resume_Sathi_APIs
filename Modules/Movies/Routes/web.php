<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Movies\Http\Controllers\MovieAttachmentController;
use Modules\Movies\Http\Controllers\MovieDashboardController;
use Modules\Movies\Http\Controllers\MoviesController;

Route::middleware('auth')->group(function () {
    // Admin Routes Start
    Route::prefix('admin/movies')->group(function () {
        Route::get('/', [MovieDashboardController::class, 'index'])->name('admin-movies');
        Route::get('/create', [MovieDashboardController::class, 'create'])->name('admin-movie-create');
        Route::match(['get', 'post'], '/save/{id}', [MovieDashboardController::class, 'store'])->name('admin-movie-save');
        Route::get('delete/{id}', [MovieDashboardController::class, 'destroy'])->name('admin-movie-delete');
    });
});

Route::prefix('movies')->group(function () {
    // Attachment
    Route::post('upload-attachment', [MovieAttachmentController::class, 'upload_attachment'])->name('movie-upload-attachment');
    Route::post('delete-attachment', [MovieAttachmentController::class, 'delete_attachment'])->name('movie-delete-attachment');

    // Frontend
    Route::get('/{slug?}', [MoviesController::class, 'index'])->name('all-movies');
    Route::get('view/{slug}', [MoviesController::class, 'show']);
});
