<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Snipit;

class SnipitController extends Controller
{
    public function index()
    {
        $snipits = Snipit::with(['category', 'programmingLanguage', 'attachments', 'codes'])->get();
        return response()->json($snipits);
    }

    public function show($id)
    {
        $snipit = Snipit::with(['category', 'programmingLanguage', 'attachments', 'codes'])->findOrFail($id);
        return response()->json($snipit);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:snipits',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:snipit_categories,id',
            'programming_language_id' => 'required|exists:programing_languages,id',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $snipit = Snipit::create($validated);
        return response()->json($snipit, 201);
    }

    public function update(Request $request, $id)
    {
        $snipit = Snipit::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:snipits,slug,' . $id,
            'description' => 'nullable|string',
            'category_id' => 'sometimes|exists:snipit_categories,id',
            'programming_language_id' => 'sometimes|exists:programing_languages,id',
            'status' => 'sometimes|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keyword' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $snipit->update($validated);
        return response()->json($snipit);
    }

    public function destroy($id)
    {
        $snipit = Snipit::findOrFail($id);
        $snipit->delete();
        return response()->json(null, 204);
    }
} 