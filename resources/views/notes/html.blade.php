@extends('frontend.layout.master')
@section('title', 'html notes')
@section('description', 'In this pdf html notes w3schools we cover all the important topic of html which help you to
    learn basic to advance tutorial of html (pdf).')
@section('keywords', 'html notes pdf,html tutorial for beginners,html notes,html,html tutorial,hyper text markup
    language,what is html,html Head tag,html Body tag,html Title tag,html Heading tag,html Paragraph tag,html Line break
    tag,html Bold tag,html Italic tag,html Underline tag,html Super script tag,html Sub Script tag,html Horizontal line
    tag,html Small tag,html Pre tag,html Mark tag,html Centre tag,html Delete text tag,html Comment tag,html Anchor
    tag,html,Remove underline,html Target attribute,html Title attribute,html Button tag,html Alt tag,Html table,HTML
    list,HTML form')
@section('canonical', 'https://www.w3coderschool.com/notes/html-notes-pdf')
@section('og-title', 'html notes')
@section('og:description', 'In this pdf html notes w3schools we cover all the important topic of html which help you to
    learn basic to advance tutorial of html (pdf).')
@section('og-url', 'https://www.w3coderschool.com/notes/html-notes-pdf')
<meta name="robots" content="noindex" />
@push('custom_css')
    <style>
        .video-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .video-container::after {
            padding-top: 56.25%;
            display: block;
            content: '';
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">


        <!-- main content area start-->
        <h1 style="color: green;font-size: 28px;text-align: center; padding-bottom: 1rem;"><strong> PDF HTML NOTES (HYPER
                TEXT MARKUP LANGUAGE) <br><span style="color: transparent;">w3schools</span></strong> </h1>
        <p style="font-size: 18px;text-align: center; padding-bottom: 1rem;">In this pdf html notes w3schools we cover all
            the important topic of html which help you to learn basic to advance tutorial of html (pdf).</p>

        <br>
        <h2><span style="font-size: 24px; color: rgb(41, 105, 176);"><strong>What is HTML?</strong></span></h2>
        <p><span style="font-size: 18px;">Html is a hyper text markup language.which is use to create structure of web
                page.</span></p>
        <h3 style='margin:0cm;font-family:"Calibri",sans-serif;'><strong><span
                    style='font-size: 18px; font-family: "Arial Black", sans-serif; color: rgb(0, 168, 133);'>Hyper text
                    markup language</span></strong></h3>
        <ul style="list-style-type: disc;">
            <li style="line-height: 2;"><span style="font-size: 18px;">The full form of HTML is hypertext markup language
                    .</span></li>
            <li style="line-height: 2;"><span style="font-size: 18px;">It is the language which is used to create web
                    pages.</span></li>
            <li style="line-height: 2;"><span style="font-size: 18px;">&lt; &gt; are use in HTML , so it is called markup
                    language.</span></li>
            <li style="line-height: 2;"><span style="font-size: 18px;">Hypertext or hyperlink means two or more page are
                    linked together.</span></li>
            <li style="line-height: 2;"><span style="font-size: 18px;">Always need to close the open tag.</span></li>
        </ul>
        <p style="line-height: 2;"><span style="font-size: 18px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;&hellip;&gt; : open
                tag</span></p>
        <p style="line-height: 2;"><span style="font-size: 18px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/&hellip;&gt; :
                close tag</span></p>
        <ul style="list-style-type: disc;margin-left:8px;">
            <li style="line-height: 2;"><span style="font-size: 18px;">The HTML file must be save with
                    <strong>.html</strong> extension.</span></li>
            <li style="line-height: 2;"><span style="font-size: 18px;">Html code not affected by two or more space, it
                    always takes only one space.</span></li>
        </ul>

        <div class="container text-center mt-5">
            <div class="row">
                <div class="col">
                    <p style="font-size: 20px; font-weight: 800;color: ;">TABLE OF CONTENTS</p>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row text-center">
                <div class="col-6">
                    <h3 style="font-size:18px">Html head tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html body tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html title tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html heading tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html paragraph tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html line break tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html bold tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html italic tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html underline tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html super script tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html sub script tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html horizontal line tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html small tag</h3>
                    <hr>

                </div>
                <div class="col-6">

                    <h3 style="font-size:18px">Html pre tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html mark tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html menter tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html delete text tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html comment tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html ancor tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html target attribute</h3>
                    <hr>
                    <h3 style="font-size:18px">Html title attribute</h3>
                    <hr>
                    <h3 style="font-size:18px">Html button tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html alt tag</h3>
                    <hr>
                    <h3 style="font-size:18px">Html table</h3>
                    <hr>
                    <h3 style="font-size:18px">Html list</h3>
                    <hr>
                    <h3 style="font-size:18px">Html form</h3>
                    <hr>
                </div>
            </div>
        </div>

        <hr>
        <p class="text-center" style="font-size:20px;font-weight:800">OTHER COURSES</p>

        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn SQL
            with notes<a class="text-success" href="{{ url('notes/sql-notes-pdf') }}"> click
                here</a><img src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif" width="24">
        </div>

        <br>
        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn CSS
            with notes<a class="text-success" href="{{ url('notes/css-notes-pdf') }}"> click
                here</a><img src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif" width="24">
        </div>
        <br>
        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn JS
            with notes<a class="text-success"> click here</a><img
                src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif" width="24">
        </div>
        <hr>
        <!-- --------------------------------
                                                                               Google Ads start
                                                                      --------------------------------- -->
        <div>
            <div class="right_cmn_border my-3">
                <div class="right_cmn_inner_div clickMeAds p-2">
                </div>
            </div>
        </div>
        <!-- --------------------------------
                                                                                                                                                                       Google Ads end
                                                                                                                                                              --------------------------------- -->



        <iframe class="iframDisplay" src="https://onedrive.live.com/embed?cid=CF70F4CB7D5FA90B&resid=CF70F4CB7D5FA90B%212038&authkey=ABCWyQLKUAsRiRI&em=2"
            width="100%" height="700" frameborder="0" scrolling="no"></iframe>
    </div>
@endsection
@section('custom-script')

@endsection
