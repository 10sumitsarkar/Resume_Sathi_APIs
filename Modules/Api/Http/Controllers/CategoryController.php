<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\CourseCategory;
use App\Models\SnipitCategory;

class CategoryController extends Controller
{
    protected $model;

    public function __construct(Request $request)
    {
        $type = $request->segment(2);
        switch ($type) {
            case 'article-categories':
                $this->model = ArticleCategory::class;
                break;
            case 'course-categories':
                $this->model = CourseCategory::class;
                break;
            case 'snipit-categories':
                $this->model = SnipitCategory::class;
                break;
            default:
                $this->model = ArticleCategory::class;
                break;
        }
    }

    public function index()
    {
        $categories = $this->model::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = $this->model::findOrFail($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:' . $this->model::getTable(),
            'description' => 'nullable|string',
        ]);

        $category = $this->model::create($validated);
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = $this->model::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:' . $this->model::getTable() . ',slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = $this->model::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
