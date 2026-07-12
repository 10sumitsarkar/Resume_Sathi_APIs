<?php

namespace Tests\Feature;

use Illuminate\Support\Carbon;
use Tests\TestCase;

class CourseViewTest extends TestCase
{
    public function test_backend_course_list_renders_when_category_is_missing(): void
    {
        $item = new \stdClass();
        $item->id = 1;
        $item->course_category = null;
        $item->user = (object) [
            'first_name' => 'John',
            'last_name' => 'Doe',
        ];
        $item->title = 'Sample Topic';
        $item->pageview = 0;
        $item->updated_at = '2026-01-01 00:00:00';
        $item->is_active = 1;
        $item->canonical_tag = 'sample-topic';

        $view = view('backend.pages.course.courses', [
            'courses' => collect([$item]),
        ]);

        $html = $view->render();

        $this->assertStringContainsString('Sample Topic', $html);
        $this->assertStringContainsString('N/A', $html);
    }

    public function test_frontend_course_page_uses_current_title_field(): void
    {
        $course = new \stdClass();
        $course->title = 'Frontend Job Title';
        $course->meta_title = 'Frontend Job Title';
        $course->meta_description = 'Description';
        $course->meta_keyword = 'job';
        $course->canonical_tag = 'jobs/frontend-job-title';
        $course->hero_image = null;
        $course->created_at = Carbon::parse('2026-01-01 00:00:00');
        $course->course_category = (object) ['course_name' => 'Category'];
        $course->user = (object) ['first_name' => 'Jane', 'last_name' => 'Doe'];
        $course->content = (object) ['content' => '<p>Body</p>'];

        $html = view('frontend.pages.course', [
            'course' => $course,
            'related' => collect([]),
        ])->render();

        $this->assertStringContainsString('Frontend Job Title', $html);
    }
}
