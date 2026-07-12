<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class MoviesAdminRoutesTest extends TestCase
{
    public function test_frontend_and_movie_routes_are_not_exposed(): void
    {
        $this->assertFalse(Route::has('index'));
        $this->assertFalse(Route::has('all-movies'));
        $this->assertFalse(Route::has('admin-movies'));
        $this->assertFalse(Route::has('admin-movie-create'));
        $this->assertFalse(Route::has('admin-movie-save'));
        $this->assertFalse(Route::has('admin-movie-delete'));
    }
}
