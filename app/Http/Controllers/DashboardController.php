<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleAttachment;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseAttachment;
use App\Models\ErrorReport;
use App\Models\SnipitAttachment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.pages.dashboard');
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
        }elseif($request->attachment_for === 'snipit'){
            $data['snipit_id'] = $request->action_id;
            $upload =  SnipitAttachment::create($data);
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
            if(File::exists($attachment->file)) {
                File::delete($attachment->file);
            }
            $delete =  ArticleAttachment::where('id', $request->id)->delete();
        }elseif($request->attachment_for === 'snipit'){
            $attachment = SnipitAttachment::find($request->id);
            if(File::exists($attachment->file)) {
                File::delete($attachment->file);
            }
            $delete =  SnipitAttachment::where('id', $request->id)->delete();
        }else{
            $attachment = CourseAttachment::find($request->id);
            if(File::exists($attachment->file)) {
                File::delete($attachment->file);
            }
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

    public function errorsList(){
        $errors = ErrorReport::orderBy('id', 'desc')->get();
        return view('backend.pages.errors.list', compact('errors'));
    }

    public function errorDelete($id){
        $response = ErrorReport::find($id)->delete();
        if($response){
            $msg = "Error removed successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }

    public function changeStatus($id){
        $response = ErrorReport::find($id);
        if($response){
            $response->is_resolved = !$response->is_resolved;
            $response->save();
            $msg = "Action saved successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }
}
