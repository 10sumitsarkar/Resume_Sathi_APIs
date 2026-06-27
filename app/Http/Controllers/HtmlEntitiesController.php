<?php

namespace App\Http\Controllers;

use App\Models\HtmlSymbol;
use App\Models\HtmlSymbolCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HtmlEntitiesController extends Controller
{
    function htmlSymbolsCategories(){
        $categories = HtmlSymbolCategory::with('user')->get();
        return view('backend.pages.html-symbols.categories', compact('categories'));
    }

    function addHtmlSymbolsCategory(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'name'=> 'required',
                'url_name' => 'required|unique:html_symbol_categories,url_name'
            ]);

            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'symbol' => $request->symbol,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'description' => $request->description,
                'url_name' => $request->url_name,
                'is_active' => $request->is_active ? 1 : 0,
                'created_by' => Auth::id(),
                'canonical_tag' => 'html-symbols/'.$request->url_name
            ];


            $response = HtmlSymbolCategory::create($data);
            if($response){
                $msg = "Category added successfully!";
                return redirect(route('html-symbols-categories'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        return view('backend.pages.html-symbols.create-category');

    }

    function deleteHtmlSymbolsCategory($id){
        $response = HtmlSymbolCategory::where('id', $id)->delete();
            if($response){
                $msg = "Category deleted successfully!";
                return redirect(route('html-symbols-categories'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
    }

    function htmlSymbolsSingleCategory(Request $request, $id){
        $id = base64_decode($id);
        if($request->isMethod('post')){
            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'symbol' => $request->symbol,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'description' => $request->description,
                'url_name' => $request->url_name,
                'is_active' => $request->is_active ? 1 : 0,
                'canonical_tag' => 'html-symbols/'.$request->url_name
            ];

            $response = HtmlSymbolCategory::where('id', $id)->update($data);
            if($response){
                $msg = "Category updated successfully!";
                return redirect(route('html-symbols-categories'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        $category = HtmlSymbolCategory::find($id);
        return view('backend.pages.html-symbols.single-category', compact('category'));
    }

    function htmlSymbols(){
        $symbols = HtmlSymbol::with('user')->get();
        return view('backend.pages.html-symbols.symbols', compact('symbols'));
    }

    function htmlSingleSymbols(Request $request, $id){
        $id = base64_decode($id);
        if($request->isMethod('post')){
            $category = HtmlSymbolCategory::find($request->category_id);
            if(!$category){
                $msg = "Category not found! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }

            $data = [
                'name' => $request->name,
                'unicode' => $request->unicode,
                'hex_code' => $request->hex_code,
                'html_code' => $request->html_code,
                'html_entity' => $request->html_entity,
                'css_code' => $request->css_code,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'url_name' => $request->url_name,
                'is_active' => $request->is_active ? 1 : 0,
                'canonical_tag' => 'html-symbols/'.$category->url_name.'/'.$request->url_name
            ];

            $response = HtmlSymbol::where('id', $id)->update($data);
            if($response){
                $msg = "Symbol updated successfully!";
                return redirect(route('html-symbols'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        $symbol = HtmlSymbol::find($id);
        return view('backend.pages.html-symbols.single-symbol', compact('symbol'));
    }

    function addHtmlSymbol(Request $request){
        if($request->isMethod('post')){

            $validation = [
                'name'=> 'required',
                'url_name' => 'required|unique:html_symbols,url_name',
            ];

            if($request->html_code){
                $validation['html_code'] = 'unique:html_symbols,html_code';
            }
            if($request->html_entity){
                $validation['html_entity'] = 'unique:html_symbols,html_entity';
            }

            $request->validate($validation);
            $category = HtmlSymbolCategory::find($request->category_id);
            if(!$category){
                $msg = "Category not found! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }

            $data = [
                'name' => $request->name,
                'unicode' => $request->unicode,
                'hex_code' => $request->hex_code,
                'html_code' => $request->html_code,
                'html_entity' => $request->html_entity,
                'css_code' => $request->css_code,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keyword' => $request->meta_keyword,
                'description' => $request->description,
                'url_name' => $request->url_name,
                'category_id' => $request->category_id,
                'is_active' => $request->is_active ? 1 : 0,
                'created_by' => Auth::id(),
                'canonical_tag' => 'html-symbols/'.$category->url_name.'/'.$request->url_name
            ];

            $response = HtmlSymbol::create($data);
            if($response){
                $msg = "Symbol added successfully!";
                return redirect(route('html-symbols'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        return view('backend.pages.html-symbols.create-symbol');

    }

    function deleteHtmlSymbol($id){
        $response = HtmlSymbol::where('id', $id)->delete();
        if($response){
            $msg = "Symbol deleted successfully!";
            return redirect(route('html-symbols'))->with('success', strtoupper($msg));
        }else{
            $msg = "Something went wrong! ";
            return redirect()->back()->with('danger', strtoupper($msg));
        }
    }
}
