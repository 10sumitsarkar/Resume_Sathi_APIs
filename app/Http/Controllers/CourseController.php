<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseContent;
use App\Models\ProgramingLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\CourseAttachment;

class CourseController extends Controller
{

    public function courses(Request $request){
        $courses = Course::with('user', 'course_category')->orderBy('id', 'desc')->get();
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
                'course_url' => $request->course_url ?: Str::slug($request->course_name),
                'description' => $request->description,
                'created_by' => Auth::id(),
                'course_image' => '',
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
        $courses = Course::with('user', 'course_category')->where(["status"=>0])->orderBy('id', 'desc')->get();
        return view('backend.pages.course.draft-courses', compact('courses', 'courses_category'));
    }

    public function create_course(){

        $course = course::where('status', 0)->orderBy('id', 'desc')->first();
        if($course){
            $course_id = $course->id;
        }else{
            $createData = [
                'status' => 0,
                'is_active' => 0,
            ];

            if (Schema::hasColumn('jobs', 'created_by')) {
                $createData['created_by'] = Auth::id();
            }

            if (Schema::hasColumn('jobs', 'title')) {
                $createData['title'] = 'New Job';
            }

            if (Schema::hasColumn('jobs', 'slug')) {
                $createData['slug'] = 'new-job';
            }

            if (Schema::hasColumn('jobs', 'description')) {
                $createData['description'] = '';
            }

            $course_id = Course::create($createData)->id;
            CourseContent::create(["course_id"=> $course_id]);
        }
        return redirect(route('save-course', base64_encode($course_id)));
    }

    public function save_course(Request $request, $encrypt_id){
        if($request->isMethod('post'))
        {
            $course_id = $request->course_id;

            // Get the topic/title - prioritize topic_name
            $topic_name = $request->topic_name ?? $request->title ?? 'Untitled';
            $meta_title = $request->meta_title ?? $topic_name;
            $meta_description = $request->meta_description ?? '';
            $meta_keyword = $request->meta_keyword ?? '';
            $description = $request->description ?? $meta_description ?? $topic_name;
            $url_title = $request->url_name ?? Str::slug($topic_name);
            $editordata = $request->editordata ?? '';
            $course_type = $request->course_type;
            $is_active = $request->is_active ? 1 : 0;
            $is_draft = $request->is_draft ? 1 : 0;
            $applicationBegin = $request->application_begin;
            $lastDateForApply = $request->last_date_for_apply;
            $hasAdmitCard = $request->boolean('has_admit_card') ? 1 : 0;
            $hasAnswerKey = $request->boolean('has_answer_key') ? 1 : 0;
            $hasResult = $request->boolean('has_result') ? 1 : 0;

            $created_by = Auth::id();

            // Get existing course to check if created_by is already set
            $existingCourse = Course::find($course_id);
            if ($existingCourse && $existingCourse->created_by) {
                $created_by = $existingCourse->created_by;
            }

            $data = CourseCategory::find($course_type);
            $canonical_tag = $data ? 'courses/' . $data->course_url . '/' . $url_title : 'courses/' . $url_title;
            $jobTypeId = null;

            if (!empty($course_type)) {
                $jobTypeId = (int) $course_type;
                if (!Schema::hasTable('job_types') || !\Illuminate\Support\Facades\DB::table('job_types')->where('id', $jobTypeId)->exists()) {
                    $jobTypeId = null;
                }
            }

            // Handle hero image upload
            if($request->file('image') !== null){
                $file1 = $request->file('image');
                $file1->move(base_path('public/courses_image'), $file1->getClientOriginalName());
                $front_image = 'courses_image/'.$file1->getClientOriginalName();

                if (Schema::hasColumn('jobs', 'hero_image')) {
                    Course::where('id', $course_id)->update(['hero_image' => $front_image]);
                }
            }

            $update = [];

            // Populate all available fields
            if (Schema::hasColumn('jobs', 'title')) {
                $update['title'] = $meta_title;
            }
            if (Schema::hasColumn('jobs', 'slug')) {
                $update['slug'] = $url_title;
            }
            if (Schema::hasColumn('jobs', 'description')) {
                $update['description'] = $description;
            }
            if (Schema::hasColumn('jobs', 'topic_name')) {
                $update['topic_name'] = $topic_name;
            }
            if (Schema::hasColumn('jobs', 'url_name')) {
                $update['url_name'] = $url_title;
            }
            if (Schema::hasColumn('jobs', 'meta_title')) {
                $update['meta_title'] = $meta_title;
            }
            if (Schema::hasColumn('jobs', 'meta_description')) {
                $update['meta_description'] = $meta_description;
            }
            if (Schema::hasColumn('jobs', 'meta_keyword')) {
                $update['meta_keyword'] = $meta_keyword;
            }
            if (Schema::hasColumn('jobs', 'canonical_tag')) {
                $update['canonical_tag'] = $canonical_tag;
            }
            if (Schema::hasColumn('jobs', 'job_type_id') && $jobTypeId !== null) {
                $update['job_type_id'] = $jobTypeId;
            }
            if (Schema::hasColumn('jobs', 'department_id') && $jobTypeId !== null) {
                $update['department_id'] = $jobTypeId;
            }
            if (Schema::hasColumn('jobs', 'course_type')) {
                $update['course_type'] = $course_type;
            }
            if (Schema::hasColumn('jobs', 'is_active')) {
                $update['is_active'] = $is_active;
            }
            if (Schema::hasColumn('jobs', 'created_by')) {
                $update['created_by'] = $created_by;
            }
            if (Schema::hasColumn('jobs', 'application_begin')) {
                $update['application_begin'] = $applicationBegin;
            }
            if (Schema::hasColumn('jobs', 'last_date_for_apply')) {
                $update['last_date_for_apply'] = $lastDateForApply;
            }
            if (Schema::hasColumn('jobs', 'has_admit_card')) {
                $update['has_admit_card'] = $hasAdmitCard;
            }
            if (Schema::hasColumn('jobs', 'has_answer_key')) {
                $update['has_answer_key'] = $hasAnswerKey;
            }
            if (Schema::hasColumn('jobs', 'has_result')) {
                $update['has_result'] = $hasResult;
            }

            // Status: if is_draft is checked, keep status 0, otherwise set to 1
            if (Schema::hasColumn('jobs', 'status')) {
                $update['status'] = $is_draft ? 0 : 1;
            }

            // Update content
            $content = ['content' => $editordata];
            CourseContent::where('course_id', $course_id)->update($content);

            // Update job record
            $edit = Course::where('id', $course_id)->update($update);

            if($edit || count($update) == 0){
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
        $course = Course::with('attachments')->find($id);
        if (!$course) {
            return redirect()->back()->with('fail', strtoupper('Something went wrong.'));
        }

        $this->deletePublicFile($course->hero_image);
        foreach ($course->attachments as $attachment) {
            $this->deletePublicFile($attachment->file);
        }

        CourseAttachment::where('course_id', $id)->delete();
        $response = $course->delete();
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

    public function toggle_status($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->back()->with('fail', strtoupper('Something went wrong.'));
        }

        $course->is_active = $course->is_active ? 0 : 1;
        if (Schema::hasColumn('jobs', 'is_draft')) {
            $course->is_draft = $course->is_active ? 0 : 1;
        }
        if (Schema::hasColumn('jobs', 'status')) {
            $course->status = 1;
        }
        $course->save();

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
}
