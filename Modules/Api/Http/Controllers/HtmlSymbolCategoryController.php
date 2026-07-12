<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HtmlSymbolCategory;

class HtmlSymbolCategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = HtmlSymbolCategory::query()->get();
            return response()->json($categories);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'HTML categories not available',
                'data' => []
            ], 200);
        }
    }

    public function show($id)
    {
        try {
            $category = HtmlSymbolCategory::query()->findOrFail($id);
            return response()->json($category);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'HTML category not found',
                'data' => null
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:html_symbol_categories',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $category = HtmlSymbolCategory::create($validated);
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $category = HtmlSymbolCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:html_symbol_categories,slug,' . $id,
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $category->update($validated);
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = HtmlSymbolCategory::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}
