<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgrammingLanguage;

class ProgrammingLanguageController extends Controller
{
    public function index()
    {
        $languages = ProgrammingLanguage::all();
        return response()->json($languages);
    }

    public function show($id)
    {
        $language = ProgrammingLanguage::findOrFail($id);
        return response()->json($language);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:programing_languages',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $language = ProgrammingLanguage::create($validated);
        return response()->json($language, 201);
    }

    public function update(Request $request, $id)
    {
        $language = ProgrammingLanguage::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:programing_languages,slug,' . $id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $language->update($validated);
        return response()->json($language);
    }

    public function destroy($id)
    {
        $language = ProgrammingLanguage::findOrFail($id);
        $language->delete();
        return response()->json(null, 204);
    }
} 