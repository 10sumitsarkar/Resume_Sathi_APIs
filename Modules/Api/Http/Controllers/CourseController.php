<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category', 'attachments', 'contents'])->get();
        return response()->json($courses);
    }

    public function show($id)
    {
        $course = Course::with(['category', 'attachments', 'contents'])->findOrFail($id);
        return response()->json($course);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:courses',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:course_categories,id',
            'status' => 'required|in:draft,published',
            'price' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
        ]);

        $course = Course::create($validated);
        return response()->json($course, 201);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:courses,slug,' . $id,
            'description' => 'nullable|string',
            'category_id' => 'sometimes|exists:course_categories,id',
            'status' => 'sometimes|in:draft,published',
            'price' => 'nullable|numeric',
            'duration' => 'nullable|string',
            'level' => 'nullable|string',
        ]);

        $course->update($validated);
        return response()->json($course);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json(null, 204);
    }
} 