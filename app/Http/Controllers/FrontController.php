<?php

namespace App\Http\Controllers;

use App\Mail\subscribers;
use App\Models\Article;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\HtmlSymbol;
use App\Models\HtmlSymbolCategory;
use App\Models\ProgramingLanguage;
use App\Models\Snipit;
use App\Models\SnipitCategory;
use App\Models\Subscriber;
use App\Models\ToolView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{

    function index()
    {
        $latest_articles = Article::latest(false, 0);
        $featured_articles = Article::random_post(false, 0);
        $blog_articles = Article::blogs(0);
        $snipitCarousel = Snipit::getCarousel(0);
        return view('frontend.pages.welcome', compact('latest_articles', 'featured_articles', 'blog_articles', 'snipitCarousel'));
    }

    function services()
    {
        return view('frontend.pages.services');
    }

    function course($id)
    {
        $category = CourseCategory::where('id', $id)->first();
        $course = Course::where('course_type', $id)->first();
        if (!$course) {
            return redirect()->back();
        }

        return redirect(url('courses/' . $category->course_url . '/' . $course->url_name));
    }


    function disclaimer()
    {
        return view('frontend.pages.disclaimer');
    }


    function our_tutorials($url = false)
    {
        $language = '';
        if ($url) {
            $language = ProgramingLanguage::where('url_name', $url)->first();
            if (!$language) {
                return view('error.error-400');
            }
            $articles = Article::with('language')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1, 'language_id' => $language->id])->orderBy('id', 'desc')->get();
        } else {
            $articles = Article::with('language')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1])->orderBy('id', 'desc')->get();
        }

        $popular = Article::popular(5);
        $popular_snipits = Snipit::popular(5);
        $languages = ProgramingLanguage::all();

        if (!$articles) {
            return redirect()->back();
        }

        return view('frontend.pages.our-tutorials', compact('articles', 'languages', 'language', 'popular', 'popular_snipits'));
    }


    function code_snipits($url = false)
    {
        $snipit_category = '';
        if ($url) {
            $snipit_category = SnipitCategory::where('url_name', $url)->first();
            if (!$snipit_category) {
                return view('error.error-400');
            }
            $snipits = Snipit::with('snipit_type')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1, 'snipit_category' => $snipit_category->id])->orderBy('id', 'desc')->get();
        } else {
            $snipits = Snipit::with('snipit_type')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1])->orderBy('id', 'desc')->get();
        }

        $popular = Article::popular(5);
        $popular_snipits = Snipit::popular(5);

        if (!$snipits) {
            return redirect()->back();
        }

        return view('frontend.pages.code-snipits', compact('snipits', 'snipit_category', 'popular_snipits', 'popular'));
    }

    function technology()
    {
        $articles = Article::with('language')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1])->whereIn('article_type', [2])->orderBy('id', 'desc')->get();
        $popular = Article::popular(5);
        $languages = ProgramingLanguage::all();

        if (!$articles) {
            return redirect()->back();
        }

        return view('frontend.pages.technology', compact('articles', 'languages', 'popular'));
    }
    function our_blogs()
    {
        $articles = Article::with('language')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1])->whereIn('article_type', [3])->orderBy('id', 'desc')->get();
        $popular = Article::popular(5);
        $languages = ProgramingLanguage::all();

        if (!$articles) {
            return redirect()->back();
        }

        return view('frontend.pages.our-blogs', compact('articles', 'languages', 'popular'));
    }
    function health()
    {
        $articles = Article::with('language')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1])->whereIn('article_type', [4])->orderBy('id', 'desc')->get();
        $popular = Article::popular(5);
        $languages = ProgramingLanguage::all();

        if (!$articles) {
            return redirect()->back();
        }

        return view('frontend.pages.health', compact('articles', 'languages', 'popular'));
    }
    function travel()
    {
        $articles = Article::with('language')->where(['is_draft' => 0, 'is_active' => 1, "status" => 1])->whereIn('article_type', [5])->orderBy('id', 'desc')->get();
        $popular = Article::popular(5);
        $languages = ProgramingLanguage::all();

        if (!$articles) {
            return redirect()->back();
        }

        return view('frontend.pages.travel', compact('articles', 'languages', 'popular'));
    }
    
    function privacy_policy()
    {
        return view('frontend.pages.privacy-policy');
    }

    function about_us()
    {
        return view('frontend.pages.about-us');
    }
    function pincode_details()
    {
        ToolView::addView(3);
        return view('frontend.tools.pincode-details');
    }
    function pdf_to_text()
    {
        ToolView::addView(2);
        return view('frontend.tools.pdf-to-text');
    }
    function case_converter()
    {
        ToolView::addView(1);
        return view('frontend.tools.case-converter');
    }
    function css_minifier()
    {
        ToolView::addView(4);
        return view('frontend.tools.css-minifier');
    }
    function age_calculator()
    {
        ToolView::addView(5);
        return view('frontend.tools.age-calculator');
    }
    function gradient_maker()
    {
        ToolView::addView(7);
        return view('frontend.tools.gradient-maker');
    }
    function px_to_rem_converter()
    {
        ToolView::addView(8);
        return view('frontend.tools.px-to-rem-converter');
    }
    function rem_to_px_converter()
    {
        ToolView::addView(9);
        return view('frontend.tools.rem-to-px-converter');
    }
    function px_to_em_converter()
    {
        ToolView::addView(10);
        return view('frontend.tools.px-to-em-converter');
    }
    function em_to_px_converter()
    {
        ToolView::addView(11);
        return view('frontend.tools.em-to-px-converter');
    }
    function webp_converter()
    {
        ToolView::addView(12);
        return view('frontend.tools.webp-converter');
    }
    function coding_play_ground()
    {
        ToolView::addView(13);
        return view('frontend.pages.coding-play-ground');
    }
    function my_resume()
    {
    ToolView::addView(14);
    return view('frontend.resume.index');
    }
    function free_resume_builder()
    {
    return view('frontend.resume.home');
    }
    function template1()
    {
    return view('frontend.resume.template1');
    }
    function template2()
    {
    return view('frontend.resume.template2');
    }
    function template3()
    {
    return view('frontend.resume.template3');
    }

    // CSS Tools
    function animate_preview_tool()
    {
    ToolView::addView(15);
    return view('frontend.tools.css.animate-preview');
    }

    function contact_us(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'first_name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                // 'phone_number' => 'regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            ], ['phone_number.regex' => 'Please enter a valid phone number.', 'phone_number.not_regex' => 'Please enter a valid phone number.']);

            $response = ContactUs::create($request->all());
            if ($response) {
                $msg = "Thanks for contacting us!";
                return redirect()->back()->with('success', strtoupper($msg));
            } else {
                $msg = "Something went wrong! ";
                return redirect()->back()->with('danger', strtoupper($msg));
            }
        }
        return view('frontend.pages.contact-us');
    }

    function terms_and_conditions()
    {
        return view('frontend.pages.terms-and-conditions');
    }

    function articles(Request $request, $category, $title)
    {
        $url = 'articles/' . $category . '/' . $title;
        $article = Article::with('content', 'user', 'language')->where('canonical_tag', $url)->first();
        if (!$article) {
            return view('error.error-400');
        }
        $article->addView();
        $related = Article::related($article->article_type, $article->id, 10);
        $latest = Article::latest($article->id, 5);
        $snipits = Snipit::random_snipit(5);
        return view('frontend.pages.article', compact('article', 'related', 'latest', 'snipits'));
    }

    function courses(Request $request, $category, $title)
    {
        $url = 'courses/' . $category . '/' . $title;

        $course = Course::with('content', 'user', 'course_category')->where('canonical_tag', $url)->first();
        if (!$course) {
            return view('error.error-400');
        }
        $course->addView();
        $related = Course::related($course->course_type);
        return view('frontend.pages.course', compact('course', 'related'));
    }

    function snipits(Request $request, $category, $title)
    {
        $url = 'snipits/' . $category . '/' . $title;

        $snipit = Snipit::with('codes', 'user', 'snipit_type')->where('canonical_tag', $url)->first();
        if (!$snipit) {
            return view('error.error-400');
        }
        $snipit->addView();
        return view('frontend.pages.snipit', compact('snipit'));
    }

    function htmlSymbols(Request $request, $category = null, $symbol = null)
    {
        if ($category && !$symbol) {
            $category_data = HtmlSymbolCategory::where(['is_active' => 1, 'url_name' => $category])->first();
            return view('frontend.pages.html-symbols-category', compact('category_data'));
        }
        if ($category && $symbol) {
            $categoryInfo = HtmlSymbolCategory::where(['is_active' => 1, 'url_name' => $category])->first();
            $singleSymbols = HtmlSymbol::where(['is_active' => 1, 'category_id' => $categoryInfo->id, 'url_name' => $symbol])->first();
            if (!$singleSymbols || !$categoryInfo) {
                return view('error.error-400');
            }
            return view('frontend.pages.single-html-symbols', compact('singleSymbols'));
        }
        return view('frontend.pages.html-symbols');
    }

    function subscribeNewUser(Request $request)
    {

        $request->validate(["email" => 'required|email|unique:subscribers,email'], ["email.unique" => "You are already subscribed!"]);
        Subscriber::create(['email' => $request->email]);

        $email_id = $request->email;
        $msg = [
            'title' => 'Thanks! for Subscribe.',
            'email' => $email_id,
            'body' => 'Thanks for subscribing to our newsletter'
        ];

        Mail::to($email_id)->send(new subscribers($msg));

        return "Thanks for subscribe!";
    }

    function error_page()
    {
        return view('error.error-400');
    }
}
