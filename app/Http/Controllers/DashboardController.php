<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleAttachment;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseAttachment;
use App\Models\ExamGuide;
use App\Models\ExamGuideAttachment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
            'examGuideCount' => ExamGuide::where('is_active', true)->where('status', true)->count(),
            'subscriberCount' => Subscriber::count(),
            'contactCount' => ContactUs::count(),
        ];

        $latestArticles = Article::query()->orderByDesc('created_at')->limit(5)->get();
        $latestJobs = Course::query()->orderByDesc('created_at')->limit(5)->get();
        $latestExamGuides = ExamGuide::query()->orderByDesc('created_at')->limit(5)->get();

        return view('backend.pages.dashboard', compact('stats', 'latestArticles', 'latestJobs', 'latestExamGuides'));
    }

    public function upload_attachment(Request $request){
        $validated = $request->validate([
            'attachment_for' => ['required', 'in:article,course,exam-guide'],
            'action_id' => ['required', 'integer'],
            'file_type' => ['required', 'integer', 'in:1,2,3'],
            'attachment' => ['required', 'file', 'max:20480'],
        ]);
        if ($validated['attachment_for'] === 'exam-guide') {
            $request->validate(['action_id' => ['exists:exam_guides,id']]);
        }

        $path = 'attachments';
        $img_name = 'file_'.Str::uuid().'.'.$request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path($path), $img_name);
        $imagePath = $path.'/'.$img_name;

        $data = [
            'file'=>$imagePath,
            'file_type' => $validated['file_type']
        ];

        if($validated['attachment_for'] === 'article'){
            $data['article_id'] = $validated['action_id'];
            $upload =  ArticleAttachment::create($data);
        } elseif ($validated['attachment_for'] === 'exam-guide') {
            $data['exam_guide_id'] = $validated['action_id'];
            $upload = ExamGuideAttachment::create($data);
        } else {
            $data['course_id'] = $validated['action_id'];
            $upload =  CourseAttachment::create($data);
        }

        if($upload){
            $response['success'] = true;
            $response['data']['file'] = asset($upload->file);
            $response['data']['file_id'] = $upload->id;
            $response['message'] = 'Success! Attachment Added Successfully.';
        }else{
            $response['success'] = false;
            $response['message'] = 'Error! Something Went Wrong.';
        }
        return $response;
    }


    public function delete_attachment(Request $request){
        $validated = $request->validate([
            'attachment_for' => ['required', 'in:article,course,exam-guide'],
            'id' => ['required', 'integer'],
        ]);

        if($validated['attachment_for'] === 'article'){
            $attachment = ArticleAttachment::find($validated['id']);
        } elseif ($validated['attachment_for'] === 'exam-guide') {
            $attachment = ExamGuideAttachment::find($validated['id']);
        } else {
            $attachment = CourseAttachment::find($validated['id']);
        }

        if ($attachment) {
            $this->deletePublicFile($attachment->file);
            $attachment->delete();
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

    public function contactUsView(ContactUs $contact)
    {
        return view('backend.pages.contact-us-view', compact('contact'));
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
