<?php

namespace Tests\Unit;

use App\Models\CourseCategory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CourseCategoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::dropIfExists('course_categories');
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_url');
            $table->string('course_image')->default('');
            $table->text('description')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function test_course_category_can_be_created_with_required_fields(): void
    {
        $category = CourseCategory::create([
            'course_name' => 'Test Category',
            'course_url' => 'test-category',
            'course_image' => '',
            'description' => 'Test Desc',
            'created_by' => 1,
        ]);

        $this->assertNotNull($category->id);
        $this->assertDatabaseHas('course_categories', [
            'course_name' => 'Test Category',
            'course_url' => 'test-category',
        ]);
    }
}
