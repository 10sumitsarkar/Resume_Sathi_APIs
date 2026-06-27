<?php

namespace App\Http\Controllers;

use App\Models\Snipit;
use App\Models\SnipitCategory;
use App\Models\SnipitCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SnipitController extends Controller
{
    function snipit_category()
    {
        $category = SnipitCategory::with('user')->get();
        return view('backend.pages.snipits.categories', compact('category'));
    }

    public function add_snipit_category(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'title'=> 'required|unique:programing_languages,title',
                'url_name' => 'required|unique:programing_languages,url_name'
            ]);
            $data = [
                'title' => $request->title,
                'url_name' => $request->url_name,
                'created_by' => Auth::id(),
            ];

            $response = SnipitCategory::create($data);
            if($response){
                $msg = "Category added successfully! ";
                return redirect(route('snipit-category'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
       return view('backend.pages.snipits.add-category');
    }

    public function edit_snipit_category(Request $request, $id){
        $category_id = base64_decode($id);
        if($request->isMethod('post')){
            $data = [
                'title' => $request->title,
                'url_name' => $request->url_name,
            ];

            $response = SnipitCategory::where('id', $category_id)->update($data);
            if($response){
                $msg = "Category updated successfully! ";
                return redirect(route('snipit-category'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }

        $category = SnipitCategory::where('id', $category_id)->first();
        if(!$category){
            return view('error.error-500');
        }
       return view('backend.pages.snipits.edit-category', compact('category'));
    }

    public function delete_snipit_category($id){
        $response = SnipitCategory::where('id', $id)->delete();
        if($response){
            $msg = "Category deleted successfully! ";
            return redirect()->back()->with('success', strtoupper($msg));
        }else{
            $msg = "Something went wrong! ";
            return redirect()->back()->with('danger', strtoupper($msg));
        }
    }


    function create_snipit(){
        $snipit = Snipit::where('status', 0)->orderBy('id', 'desc')->first();
        if($snipit){
            $snipit_id = $snipit->id;
        }else{
            $snipit_id = Snipit::create(["snipit_category"=>1, "is_draft"=>1, 'status'=>0, "is_active"=>0, "created_by" => Auth::id()])->id;
            SnipitCode::create(["snipit_id"=> $snipit_id]);
        }
        return redirect(route('save-snipit', base64_encode($snipit_id)));
    }

    public function save_snipit(Request $request, $encrypt_id){
        if($request->isMethod('post'))
        {
            $snipit_id = $request->snipit_id;
            $title = $request->title;
            $meta_title = $request->meta_title;
            $description = $request->meta_description;
            $keyword = $request->meta_keyword;
            $url_title = $request->url_name;
            $html = $request->html;
            $css = $request->css;
            $javascript = $request->javascript;
            $snipit_category = $request->snipit_type;
            $language_id = $request->language;
            $is_active = $request->is_active;
            $is_draft = $request->is_draft;
            $created_by = 1;
            $data = SnipitCategory::find($snipit_category);
            $canonical_tag = "snipits/".$data->url_name.'/'.$url_title;

            if($request->file('image') !== null){
                $file = $request->file('image');
                $path = 'snipit_image';
                $img_name = 'file_'.time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path($path), $img_name);
                $imagePath = $path.'/'.$img_name;
                $update = ["hero_image"=>$imagePath];
                Snipit::where('id', $snipit_id)->update($update);
            }

            $update = [
                'title'=> $title,
                'url_name'=>$url_title,
                'meta_title'=> $meta_title,
                'meta_description'=> $description,
                'meta_keyword'=> $keyword,
                'canonical_tag'=> $canonical_tag,
                'snipit_category'=> $snipit_category,
                "status"=> 1,
                'created_by'=>$created_by
            ];

            if($is_active){
               $update['is_active'] = 1;
            }else{
               $update['is_active'] = 0;
            }

            if($is_draft){
                $update['is_draft'] = 1;
            }else{
                $update['is_draft'] = 0;
            }

            $codes = ['html'=> $html, 'css'=> $css, 'javascript'=> $javascript];

            $edit = SnipitCode::where('snipit_id', $snipit_id)->update($codes);
            $edit = Snipit::where('id', $snipit_id)->update($update);
            if($edit){
                $msg = "Snipit Saved successfully! ";
                return redirect()->back()->with('success', strtoupper($msg));
            }else{
                $msg = "Snipit Saved failed! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        $snipit_id = base64_decode($encrypt_id);
        $snipit = Snipit::with('codes')->find($snipit_id);
        if(!$snipit){
            return view('error.error-500');
        }
        $snipit_category = SnipitCategory::all();
        return view('backend.pages.snipits.create-snipit', compact('snipit_category', 'snipit'));
    }

    public function draft_snipits(Request $request){
        $snipits_category = SnipitCategory::all();
        $snipits = Snipit::with('user', 'snipit_type')->where(['is_draft'=> 1, 'status' => 1])->orderBy('id', 'desc')->get();
        // dd($snipits);
        return view('backend.pages.snipits.draft-snipit', compact('snipits', 'snipits_category'));
    }

    public function snipits(Request $request){
        $snipits = Snipit::with('user', 'snipit_type')->where(['is_draft'=> 0, "status"=>1])->orderBy('id', 'desc')->get();
        return view('backend.pages.snipits.snipits', compact('snipits'));
    }

    function snipit_delete($id){
        $response =  Snipit::find($id)->delete();
        SnipitCode::where('snipit_id', $id)->delete();
        if($response){
            $msg = "Snipit deleted successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }


}
