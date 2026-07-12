<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ApiCleanupTest extends TestCase
{
    public function test_unwanted_feature_routes_are_removed(): void
    {
        $this->assertFalse(Route::has('index'));
        $this->assertFalse(Route::has('all-movies'));
        $this->assertFalse(Route::has('admin-movies'));
        $this->assertFalse(Route::has('html-symbols'));
        $this->assertFalse(Route::has('snipits'));
        $this->assertFalse(Route::has('code-snipits'));
        $this->assertTrue(Route::has('login'));
        $this->assertTrue(Route::has('dashboard'));
    }
}
