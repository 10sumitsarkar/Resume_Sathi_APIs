<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseContent;
use App\Models\User;
use Tests\TestCase;

class CourseSaveTest extends TestCase
{
    public function test_save_course_saves_all_seo_fields(): void
    {
        $user = User::first() ?? User::factory()->create();
        $this->actingAs($user);

        $category = CourseCategory::first() ?? CourseCategory::factory()->create();

        // Create a draft course
        $course = Course::create([
            'status' => 0,
            'is_active' => 0,
        ]);
        CourseContent::create(['course_id' => $course->id]);

        $course_id = base64_encode($course->id);

        $response = $this->post(route('save-course', $course_id), [
            'course_id' => $course->id,
            'topic_name' => 'SEO Test Job',
            'url_name' => 'seo-test-job',
            'description' => 'This is a test description',
            'meta_title' => 'SEO Test Job Title',
            'meta_description' => 'This is the meta description for SEO',
            'meta_keyword' => 'job, seo, test',
            'course_type' => $category->id,
            'is_active' => 1,
            'is_draft' => 0,
            'editordata' => '<p>Test content here</p>',
        ]);

        $saved = Course::find($course->id);

        $this->assertEquals('SEO Test Job', $saved->topic_name);
        $this->assertEquals('seo-test-job', $saved->url_name);
        $this->assertEquals('This is a test description', $saved->description);
        $this->assertEquals('SEO Test Job Title', $saved->meta_title);
        $this->assertEquals('This is the meta description for SEO', $saved->meta_description);
        $this->assertEquals('job, seo, test', $saved->meta_keyword);
        $this->assertEquals($category->id, $saved->course_type);
        $this->assertEquals(1, $saved->is_active);
        $this->assertEquals(1, $saved->status);
        $this->assertNotNull($saved->created_by);
    }

    public function test_save_course_respects_draft_status(): void
    {
        $user = User::first() ?? User::factory()->create();
        $this->actingAs($user);

        $category = CourseCategory::first() ?? CourseCategory::factory()->create();

        $course = Course::create(['status' => 0, 'is_active' => 0]);
        CourseContent::create(['course_id' => $course->id]);

        $course_id = base64_encode($course->id);

        // Save as draft
        $this->post(route('save-course', $course_id), [
            'course_id' => $course->id,
            'topic_name' => 'Draft Job',
            'url_name' => 'draft-job',
            'is_draft' => 1,
            'editordata' => 'content',
        ]);

        $saved = Course::find($course->id);
        $this->assertEquals(0, $saved->status);
    }
}
