<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HtmlSymbol;

class HtmlSymbolController extends Controller
{
    public function index()
    {
        $symbols = HtmlSymbol::with('category')->get();
        return response()->json($symbols);
    }

    public function show($id)
    {
        $symbol = HtmlSymbol::with('category')->findOrFail($id);
        return response()->json($symbol);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string',
            'category_id' => 'required|exists:html_symbol_categories,id',
            'description' => 'nullable|string',
            'example' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $symbol = HtmlSymbol::create($validated);
        return response()->json($symbol, 201);
    }

    public function update(Request $request, $id)
    {
        $symbol = HtmlSymbol::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'symbol' => 'sometimes|string',
            'category_id' => 'sometimes|exists:html_symbol_categories,id',
            'description' => 'nullable|string',
            'example' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $symbol->update($validated);
        return response()->json($symbol);
    }

    public function destroy($id)
    {
        $symbol = HtmlSymbol::findOrFail($id);
        $symbol->delete();
        return response()->json(null, 204);
    }
} 