<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseContent;
use App\Models\ProgramingLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function courses(Request $request){
        $courses = course::with('user', 'course_category')->where(['is_draft'=> 0, "status"=>1])->orderBy('id', 'desc')->get();
        return view('backend.pages.course.courses', compact('courses'));
    }

    public function courses_category(){
       $category = CourseCategory::with('user')->get();
       return view('backend.pages.course.course-category', compact('category'));
    }

    public function course_category_delete($id){
        $response = CourseCategory::where('id', $id)->delete();
        if($response){
            $msg = "Category deleted successfully! ";
            return redirect()->back()->with('success', strtoupper($msg));
        }else{
            $msg = "Something went wrong! ";
            return redirect()->back()->with('danger', strtoupper($msg));
        }
    }

    public function add_course_category(Request $request){
        if($request->isMethod('post')){
            $data = [
                'course_name' => $request->course_name,
                'course_url' => $request->course_url,
                'description' => $request->description,
                'created_by' => Auth::id(),
            ];

            if($request->file('image') !== null){
                $file1 = $request->file('image');
                $file1->move(base_path('public/courses'), $file1->getClientOriginalName());
                $front_image = 'courses/'.$file1->getClientOriginalName();
                $data['course_image'] = $front_image;
            }

            $response = CourseCategory::create($data);
            if($response){
                $msg = "Category added successfully! ";
                return redirect(route('courses-category'))->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect(route('courses-category'))->with('danger', strtoupper($msg));
            }
        }
       return view('backend.pages.course.add-category');
    }

    public function course_category_edit(Request $request, $id){
        $category_id = base64_decode($id);
        if($request->isMethod('post')){
            $data = [
                'course_name' => $request->course_name,
                'course_url' => $request->course_url,
                'description' => $request->description,
            ];

            if($request->file('image') !== null){
                $file1 = $request->file('image');
                $file1->move(base_path('public/courses'), $file1->getClientOriginalName());
                $front_image = 'courses/'.$file1->getClientOriginalName();
                $data['course_image'] = $front_image;
            }
            $response = CourseCategory::where('id', $category_id)->update($data);
            if($response){
                $msg = "Category updated successfully! ";
                return redirect()->back()->with('success', strtoupper($msg));
            }else{
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }

        $category = CourseCategory::where('id', $category_id)->first();
        if(!$category){
            return view('error.error-500');
        }
       return view('backend.pages.course.edit-category', compact('category'));
    }

    public function draft_courses(Request $request){
        $courses_category = CourseCategory::all();
        $courses = Course::with('user', 'course_category')->where(['is_draft'=> 1, "status"=>1])->orderBy('id', 'desc')->get();
        return view('backend.pages.course.draft-courses', compact('courses', 'courses_category'));
    }

    public function create_course(){

        $course = course::where('status', 0)->orderBy('id', 'desc')->first();
        if($course){
            $course_id = $course->id;
        }else{
            $course_id = Course::create(["course_type"=>1, "is_draft"=>1, 'status'=>0, "is_active"=>0, "created_by" => Auth::id()])->id;
            CourseContent::create(["course_id"=> $course_id]);
        }
        return redirect(route('save-course', base64_encode($course_id)));
    }

    public function save_course(Request $request, $encrypt_id){
        if($request->isMethod('post'))
        {
            $course_id = $request->course_id;
            $topic_name = $request->topic_name;
            $title = $request->meta_title;
            $description = $request->meta_description;
            $keyword = $request->meta_keyword;
            $url_title = $request->url_name;
            $editordata = $request->editordata;
            $course_type = $request->course_type;
            $is_active = $request->is_active;
            $is_draft = $request->is_draft;
            $created_by = 1;
            $data = CourseCategory::find($course_type);
            $canonical_tag = "courses/".$data->course_url.'/'.$url_title;
            if($request->file('image') !== null){
                $file1 = $request->file('image');
                $file1->move(base_path('public/courses_image'), $file1->getClientOriginalName());
                $front_image = 'courses_image/'.$file1->getClientOriginalName();
                $update = ["hero_image"=>$front_image];
                Course::where('id', $course_id)->update($update);
            }

            $update = [
                'topic_name'=> $topic_name,
                'url_name'=>$url_title,
                'meta_title'=> $title,
                'meta_description'=> $description,
                'meta_keyword'=> $keyword,
                'canonical_tag'=> $canonical_tag,
                'course_type'=> $course_type,
                'status'=> 1,
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

            $content = ['content'=> $editordata];

            $edit = CourseContent::where('course_id', $course_id)->update($content);
            $edit = Course::where('id', $course_id)->update($update);
            if($edit){
                $msg = "Post Saved successfully! ";
                return redirect()->back()->with('success', strtoupper($msg));
            }else{
                $msg = "Post Saved failed! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        $course_id = base64_decode($encrypt_id);
        $course = Course::with('content', 'attachments')->find($course_id);
        if(!$course){
            return view('error.error-500');
        }
        $course_category = CourseCategory::all();
        return view('backend.pages.course.create-course', compact('course_category', 'course'));
    }

    function course_delete($id){
        $response =  Course::find($id)->delete();
        CourseContent::where('course_id', $id)->delete();

        if($response){
            $msg = "Post deleted successfully!";
            $status = 'success';
        }else{
            $msg = "Something went wrong.";
            $status = 'fail';
        }
        return redirect()->back()->with($status, strtoupper($msg));
    }
}
