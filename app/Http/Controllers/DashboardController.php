<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleAttachment;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseAttachment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index(){
        $stats = [
            'articleCount' => Article::where('is_active', 1)->where('status', 1)->count(),
            'draftArticleCount' => Article::where('is_draft', 1)->count(),
            'jobCount' => Course::where('is_active', 1)->where('status', 1)->count(),
            'draftJobCount' => Course::where(function ($query) {
                $query->where('is_active', 0)->orWhere('status', 0);
            })->count(),
            'subscriberCount' => Subscriber::count(),
            'contactCount' => ContactUs::count(),
        ];

        $latestArticles = Article::query()->orderByDesc('created_at')->limit(5)->get();
        $latestJobs = Course::query()->orderByDesc('created_at')->limit(5)->get();

        return view('backend.pages.dashboard', compact('stats', 'latestArticles', 'latestJobs'));
    }

    public function upload_attachment(Request $request){
        $path = 'attachments';
        $img_name = 'file_'.time().'.'.$request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path($path), $img_name);
        $imagePath = $path.'/'.$img_name;

        $data = [
            'file'=>$imagePath,
            'file_type' => $request->file_type
        ];

        if($request->attachment_for === 'article'){
            $data['article_id'] = $request->action_id;
            $upload =  ArticleAttachment::create($data);
        }else{
            $data['course_id'] = $request->action_id;
            $upload =  CourseAttachment::create($data);
        }

        if($upload){
            $response['success'] = true;
            $response['data']['file'] = $upload->file_url;
            $response['data']['file_id'] = $upload->id;
            $response['message'] = 'Success! Attachment Added Successfully.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Error! Something Went Wrong.';
        }
        return $response;
    }


    public function delete_attachment(Request $request){

        if($request->attachment_for === 'article'){
            $attachment = ArticleAttachment::find($request->id);
            $this->deletePublicFile($attachment?->file);
            $delete =  ArticleAttachment::where('id', $request->id)->delete();
        }else{
            $attachment = CourseAttachment::find($request->id);
            $this->deletePublicFile($attachment?->file);
            $delete =  CourseAttachment::where('id', $request->id)->delete();
        }

        if($delete){
            $response['success'] = true;
            $response['message'] = 'Success! Attachment Deleted Successfully.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Error! Something Went Wrong.';
        }
        return $response;

    }

    public function subscribersList(){
        $subscribers = Subscriber::orderBy('id', 'desc')->get();
        return view('backend.pages.subscribers', compact('subscribers'));
    }

    public function subscriberDelete($id){
        $response = Subscriber::find($id)->delete();
        if($response){
            $msg = "Subscriber removed successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }

    function ContactUS(){
        $contacts = ContactUs::orderBy('id', 'desc')->get();
        return view('backend.pages.contact-us-list', compact('contacts'));
    }

    public function contactUsDelete($id){
        $response = ContactUs::find($id)->delete();
        if($response){
            $msg = "Contact request removed successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
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

}
