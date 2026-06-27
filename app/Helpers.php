<?php

use App\Models\Article;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\HtmlSymbolCategory;
use App\Models\NoteView;
use App\Models\ProgramingLanguage;
use App\Models\Snipit;
use App\Models\SnipitCategory;
use App\Models\Subscriber;
use App\Models\ToolView;
use App\Models\User;
use Carbon\Carbon;

function our_courses()
{
    return CourseCategory::all();
}

function our_tutorials()
{
    return ProgramingLanguage::all();
}

function our_snipits()
{
    return SnipitCategory::all();
}

function getHtmlSymbolCategories()
{
    return HtmlSymbolCategory::where('is_active', 1)->get();
}

function getTodayViews()
{
    return json_decode(json_encode([
        'article' => Article::todayViews(),
        'course' => Course::todayViews(),
        'snipit' => Snipit::todayViews(),
        'tool' => ToolView::todayViews(),
        'note' => NoteView::todayViews(),
    ]));
}

function getTotalViews()
{
    return json_decode(json_encode([
        'article' => Article::totalViews(),
        'course' => Course::totalViews(),
        'snipit' => Snipit::totalViews(),
        'tool' => ToolView::totalViews(),
        'note' => NoteView::totalViews(),
    ]));
}

function getTotalToolViews()
{
    return json_decode(json_encode([
        'case_converter' => ToolView::totalViews(1),
        'padf_to_text' => ToolView::totalViews(2),
        'pincode_details' => ToolView::totalViews(3),
        'css_minifier' => ToolView::totalViews(4),
        'age_calculator' => ToolView::totalViews(5),
        'white_board' => ToolView::totalViews(6), 
        'gradient_maker' => ToolView::totalViews(7), 
        'px_to_rem_converter' => ToolView::totalViews(8), 
        'rem_to_px_converter' => ToolView::totalViews(9), 
        'px_to_em_converter' => ToolView::totalViews(10), 
        'em_to_px_converter' => ToolView::totalViews(11), 
        'webp_converter' => ToolView::totalViews(12), 
        'coding_play_ground' => ToolView::totalViews(13), 
        'my_resume' => ToolView::totalViews(14), 
    ]));
}

function getTodayTotalViews()
{
    return getTodayViews()->article + getTodayViews()->course + getTodayViews()->snipit + getTodayViews()->tool + getTodayViews()->note;
}

function getAllPosts()
{
    return json_decode(json_encode([
        'article' => Article::activePost()->count(),
        'course' => Course::activePost()->count(),
        'snipit' => Snipit::activePost()->count(),
    ]));
}

function getAllPostsCount()
{
    return getAllPosts()->article + getAllPosts()->course + getAllPosts()->snipit;
}

function getTodayUniquePostViews()
{
    return json_decode(json_encode([
        'article' => Article::getTodayPostClicks()->count(),
        'course' => Course::getTodayPostClicks()->count(),
        'snipit' => Snipit::getTodayPostClicks()->count(),
    ]));
}

function getTodayAllUniquePostViews()
{
    return getTodayUniquePostViews()->article + getTodayUniquePostViews()->course + getTodayUniquePostViews()->snipit;
}

function getAllSubscriberCount()
{
    return Subscriber::count();
}

function getAllUsersCount()
{
    return User::count();
}


function getAllContactCount()
{
    return ContactUs::count();
}


function getHtmlSymobolCategories()
{
    return HtmlSymbolCategory::where('is_active', 1)->get();
}

function currentYear(){
    return Carbon::now()->format('Y');
}
