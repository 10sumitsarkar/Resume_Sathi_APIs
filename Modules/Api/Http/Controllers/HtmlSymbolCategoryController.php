<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HtmlSymbolCategory;

class HtmlSymbolCategoryController extends Controller
{
    public function index()
    {
        $categories = HtmlSymbolCategory::with('symbols')->get();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = HtmlSymbolCategory::with('symbols')->findOrFail($id);
        return response()->json($category);
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