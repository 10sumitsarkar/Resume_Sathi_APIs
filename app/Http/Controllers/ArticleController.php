<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleAttachment;
use App\Models\ArticleCategory;
use App\Models\ArticleComment;
use App\Models\ArticleContent;
use App\Models\ProgramingLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function articles(Request $request){
        $articles = Article::with('user', 'article_category', 'language')->where(['is_draft'=> 0, "status"=>1])->orderBy('id', 'desc')->get();
        return view('backend.pages.articles.articles', compact('articles'));
    }

    public function draft_articles(Request $request){
        $articles_category = ArticleCategory::all();
        $articles = Article::with('user', 'article_category')->where(['is_draft'=> 1, 'status' => 1])->orderBy('id', 'desc')->get();
        return view('backend.pages.articles.draft-articles', compact('articles', 'articles_category'));
    }

    public function create_article(){
        $article = Article::where('status', 0)->orderBy('id', 'desc')->first();
        if($article){
            $article_id = $article->id;
        }else{
            $article_id = Article::create(["article_type"=>1, "is_draft"=>1, 'status'=>0, "is_active"=>0, "created_by" => Auth::id()])->id;
            ArticleContent::create(["article_id"=> $article_id]);
        }
        return redirect(route('save-article', base64_encode($article_id)));
    }

    public function save_article(Request $request, $encrypt_id){
        if($request->isMethod('post'))
        {
            $article_id = $request->article_id;
            $article_title = $request->article_title;
            $title = $request->meta_title;
            $description = $request->meta_description;
            $keyword = $request->meta_keyword;
            $url_title = $request->url_name;
            $editordata = $request->editordata;
            $article_type = $request->article_type;
            $language_id = $request->language;
            $is_active = $request->is_active;
            $is_draft = $request->is_draft;
            $data = ArticleCategory::find($article_type);
            $canonical_tag = "articles/".$data->url_name.'/'.$url_title;

            if($request->file('image') !== null){
                $file = $request->file('image');
                $path = 'articles_image';
                $img_name = 'file_'.time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path($path), $img_name);
                $imagePath = $path.'/'.$img_name;
                $update = ["hero_image"=>$imagePath];
                Article::where('id', $article_id)->update($update);
            }

            $update = [
                'article_title'=> $article_title,
                'url_name'=>$url_title,
                'meta_title'=> $title,
                'meta_description'=> $description,
                'meta_keyword'=> $keyword,
                'canonical_tag'=> $canonical_tag,
                'article_type'=> $article_type,
                "language_id"=> $language_id,
                "status"=> 1,
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

            $content = ['content'=> $editordata];

            $edit = ArticleContent::where('article_id', $article_id)->update($content);
            $edit = Article::where('id', $article_id)->update($update);
            if($edit){
                $msg = "Post Saved successfully! ";
                return redirect()->back()->with('success', strtoupper($msg));
            }else{
                $msg = "Post Saved failed! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        $article_id = base64_decode($encrypt_id);
        $article = Article::with('content', 'attachments')->find($article_id);
        if(!$article){
            return view('error.error-500');
        }
        $articles_category = ArticleCategory::all();
        $languages = ProgramingLanguage::all();
        return view('backend.pages.articles.create-article', compact('articles_category', 'languages', 'article'));
    }


    function article_delete($id){
        $response =  Article::find($id)->delete();
        ArticleContent::where('article_id', $id)->delete();

        if($response){
            $msg = "Post deleted successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }

    function tutorials(){
        $tutorials = ProgramingLanguage::with('user')->get();
        return view('backend.pages.tutorials.languages', compact('tutorials'));
    }


    public function add_tutorial(Request $request){
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

            if($request->file('image') !== null){
                $file1 = $request->file('image');
                $file1->move(base_path('public/tutorials'), $file1->getClientOriginalName());
                $front_image = 'tutorials/'.$file1->getClientOriginalName();
                $data['image'] = $front_image;
            }

            $response = ProgramingLanguage::create($data);
            if($response){
                $msg = "Tutorial added successfully! ";
                return redirect(route('add-tutorial'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect(route('add-tutorial'))->with('danger', strtoupper($msg));
            }
        }
       return view('backend.pages.tutorials.add-tutorial');
    }



    public function tutorial_edit(Request $request, $id){
        $tutorial_id = base64_decode($id);
        if($request->isMethod('post')){
            $data = [
                'title' => $request->title,
                'url_name' => $request->url_name,
            ];

            if($request->file('image') !== null){
                $file1 = $request->file('image');
                $file1->move(base_path('public/tutorials'), $file1->getClientOriginalName());
                $front_image = 'tutorials/'.$file1->getClientOriginalName();
                $data['image'] = $front_image;
            }
            $response = ProgramingLanguage::where('id', $tutorial_id)->update($data);
            if($response){
                $msg = "Tutorial updated successfully! ";
                return redirect()->back()->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }

        $tutorial = ProgramingLanguage::where('id', $tutorial_id)->first();
        if(!$tutorial){
            return view('error.error-500');
        }
       return view('backend.pages.tutorials.edit-tutorial', compact('tutorial'));
    }

    public function tutorial_delete($id){
        $response = ProgramingLanguage::where('id', $id)->delete();
        if($response){
            $msg = "Tutorial deleted successfully! ";
            return redirect()->back()->with('success', strtoupper($msg));
        }else{
            $msg = "Something went wrong! ";
            return redirect()->back()->with('danger', strtoupper($msg));
        }
    }

    public function postComment(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'comment'  => 'required|max:2048',
            'email'  => 'required|max:100',
            'name'  => 'required|max:100',
        ]);


        if ($validator->fails()) {
            // $contents = view('partials.news.comments',
            //     ['article' => $article, 'user' => $request->user(), 'errors' => $validator->errors()])->render();

            // return response()->json(['html' => $contents], 400);
        } else {
            $comment = ArticleComment::create([
                'text'       => $request->comment,
                'article_id' => $id,
                'name'    => $request->username,
                'email'    => $request->email,
            ]);

            $contents = view('partials.news.comments')->render();

            return response()->json(['html' => $contents, 'comment' => $comment->id], 200);
        }
    }
}



