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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function articles(Request $request){
        $articles = Article::with('user', 'article_category', 'language')->where("status", 1)->orderBy('id', 'desc')->get();
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
        $article = Article::with('attachments')->find($id);
        if (!$article) {
            return redirect()->back()->with('fail', strtoupper('Something went wrong.'));
        }

        $this->deletePublicFile($article->hero_image);
        foreach ($article->attachments as $attachment) {
            $this->deletePublicFile($attachment->file);
        }

        ArticleAttachment::where('article_id', $id)->delete();
        $response = $article->delete();
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

    public function toggle_status($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return redirect()->back()->with('fail', strtoupper('Something went wrong.'));
        }

        $article->is_active = $article->is_active ? 0 : 1;
        $article->is_draft = $article->is_active ? 0 : 1;
        $article->status = 1;
        $article->save();

        return redirect()->back()->with('success', strtoupper('Status updated successfully.'));
    }

    private function deletePublicFile(?string $path): void
    {
        if (!$path) {
            return;
        }

        $relativePath = ltrim(parse_url($path, PHP_URL_PATH) ?: $path, '/');
        $relativePath = preg_replace('#^(public/|storage/)#', '', $relativePath);
        $fullPath = public_path($relativePath);

        if (File::exists($fullPath) && File::isFile($fullPath)) {
            File::delete($fullPath);
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



