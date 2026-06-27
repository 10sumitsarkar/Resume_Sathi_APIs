@extends('frontend.layout.master')
@section('title', 'css notes')
@section('description',
    'In this tutorial we cover all the topic of cascading style sheets (css) which help you to learn
    basic to advance tutorial of css (pdf).')
@section('keywords',
    'css,w3schools,w3schools css,cascading style sheets,css notes,css notes pdf,pdf of css,css pdf,what is css, what is full
    form of css,why css use,what is cascading style sheets,how to design website, how to design web pages,,CSS
    Introduction,CSS Syntax,CSS Selectors,CSS How To,CSS Comments,CSS Colors,CSS Backgrounds,CSS Borders,CSS Margins,CSS
    Padding,CSS Height/Width,CSS Box Model,CSS Outline,CSS Text,CSS Fonts,CSS Icons,CSS Links,CSS Lists,CSS Tables,CSS
    Display,CSS Max-width,CSS Position,CSS Overflow,CSS Float,CSS Inline-block,CSS Align,CSS Combinators,CSS
    Pseudo-class,CSS Pseudo-element,CSS Opacity,CSS Navigation Bar,CSS Dropdowns,CSS Image Gallery,CSS Image Sprites,CSS
    Attr Selectors,CSS Forms,CSS Counters,CSS Website Layout,CSS Units,CSS Specificity,CSS !important,CSS Rounded
    Corners,CSS Border Images,CSS Backgrounds,CSS Colors,CSS Color Keywords,CSS Gradients,CSS Shadows,CSS Text Effects,CSS
    Web Fonts,CSS 2D Transforms,CSS 3D Transforms,CSS Transitions,CSS Animations,CSS Tooltips,CSS Style Images,CSS Image
    Reflection,CSS object-fit,CSS object-position,CSS Buttons,CSS Pagination,CSS Multiple Columns,CSS User Interface,CSS
    Variables,CSS Box Sizing,CSS Media Queries,CSS MQ Examples,CSS FlexboxRWD IntroRWD ViewportRWD Grid ViewRWD Media
    QueriesRWD ImagesRWD VideosRWD FrameworksRWD TemplatesGrid IntroGrid ContainerGrid Item,CSS Templates,CSS Examples,CSS
    Quiz,CSS Exercises,CSS Certificate,CSS Reference,CSS Selectors,CSS Functions,CSS Reference Aural,CSS Web Safe Fonts,CSS
    Animatable,CSS Units,CSS PX-EM Converter,CSS Colors,CSS Color Values')
@section('canonical', 'https://www.w3coderschool.com/notes/css-notes-pdf')

@section('og-title', 'css notes')
@section('og:description',
    'In this tutorial we cover all the topic of cascading style sheets (css) which help you to
    learn basic to advance tutorial of css (pdf).')
@section('og-url', 'https://www.w3coderschool.com/notes/css-notes-pdf')
<meta name="robots" content="noindex" />
@push('custom-css')
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
        <h1 style="color: green;font-size: 28px;text-align: center; padding-bottom: 1rem;"><strong>PDF CSS NOTES (CASCADING
                STYLE SHEETS) <br><span style="color: transparent;">w3schools</span> </strong> </h1>
        <p style="font-size: 18px;text-align: center; padding-bottom: 1rem;">In this pdf css notes w3schools we cover the
            topic of cascading style sheets (css) which help you to learn basic to advance tutorial of css (pdf).</p>

        <br>
        <br>
        <h2><span style="font-size: 24px; color: rgb(41, 105, 176);"><strong>What is CSS?</strong></span></h2>
        <p><span style="font-size: 18px;">CSS is a cascading style sheets, which is use to design the web pages.</span></p>
        <h3><strong><span style='font-size: 18px;color: rgb(0, 168, 133);'>Cascading Style Sheets</span></strong></h3>
        <ul>
            <li style="box-sizing: border-box; line-height: 2;"><span
                    style="box-sizing: border-box; font-size: 18px;"><strong
                        style="box-sizing: border-box; font-weight: bolder;">Cascading Style Sheets (CSS)</strong> is a
                    markup language which is responsible for how your each web pages will look like. using it we controls
                    the colors, fonts, &nbsp;layouts of your website elements and many more .</span></li>
            <li style="box-sizing: border-box; line-height: 2;"><span style="font-size: 18px;"><span
                        style="box-sizing: border-box;">style sheet language also allows you to add effects or animations to
                        your website.&nbsp;</span></span></li>
            <li style="box-sizing: border-box; line-height: 2;"><span style="font-size: 18px;"><span
                        style="box-sizing: border-box;"><span
                            style='box-sizing: border-box; font-family: "Times New Roman", serif; color: black; background: white;'>you
                            can design Multiple web pages by one css file.</span></span></span></li>
            <li style="box-sizing: border-box; line-height: 2;"><span style="font-size: 18px;"><span
                        style="box-sizing: border-box;"><span
                            style='box-sizing: border-box; font-family: "Times New Roman", serif; color: black; background: white;'>CSS
                            is supported by all the browsers .</span></span></span></li>
            <li style="box-sizing: border-box; line-height: 2;"><span style="font-size: 18px;"><span
                        style="box-sizing: border-box;"><span
                            style='box-sizing: border-box; font-family: "Times New Roman", serif; color: black; background: white;'>Extension
                            used to save CSS files is &quot;</span><strong
                            style="box-sizing: border-box; font-weight: bolder;"><span
                                style='box-sizing: border-box; font-family: "Arial Black", sans-serif; color: black; background: white;'>.</span></strong><span
                            style='box-sizing: border-box; font-family: "Arial Black", sans-serif; color: black; background: white;'>css</span></span></span><span
                    style='box-sizing: border-box; font-family: "Times New Roman", serif; background: white; font-size: 18px; color: black;'>&quot;.</span>
            </li>
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
                    <h3 style="font-size:18px">CSS Introduction</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS color</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS background</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS border</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS margin</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS padding</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS height/width</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS box model</h3>
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
                    <hr>
                    <h3 style="font-size:18px">CSS outline</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS text</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS fonts</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS icons</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS links</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS list</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS tables</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS display</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS max-min</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS comments</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS position</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS overflow</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS float</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS inline block</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS align</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS pseudo-class</h3>
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
                    <hr>
                </div>
                <div class="col-6">
                    <h3 style="font-size:18px">CSS opacity</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS gradient</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS shadow</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS text effect</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS 2D transform</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS 3D transform</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS transition</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS aniomation</h3>
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
                    <hr>
                    <h3 style="font-size:18px">CSS box-sizing</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS variables</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS media quaries</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS flex box</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS object-fit</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS image reflection</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS object position</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS rounded corners</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS tooltips</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS forms</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS class</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS id</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS attr selectors</h3>
                    <hr>
                    <h3 style="font-size:18px">CSS position</h3>
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
                    <hr>

                </div>
            </div>
        </div>

        <hr>
        <p class="text-center" style="font-size:20px;font-weight:800">OTHER COURSES</p>

        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn SQL
            with notes <a class="text-success" href="https://www.w3coderschool.com/notes/sql-notes-pdf"> click
                here </a><img src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif" width="24">
        </div>

        <br>
        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn
            HTML with notes <a class="text-success" href="https://www.w3coderschool.com/notes/html-notes-pdf">
                click here </a><img src="{{ asset('front-assets/images/icons/new-image.gif') }}" alt="new_gif"
                width="24"></div>
        <br>
        <div style="text-align:center;font-weight:800;"><img src="{{ asset('front-assets/images/icons/new-image.gif') }}"
                alt="new_gif" width="24"> Learn JS
            with notes <a class="text-success"> click here</a><img
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



        <iframe class="iframDisplay" src="https://onedrive.live.com/embed?cid=CF70F4CB7D5FA90B&resid=CF70F4CB7D5FA90B%212502&authkey=APZYdrQMkOJsXno&em=2"
            width="100%" height="700" frameborder="0" scrolling="no"></iframe>
    </div>
@endsection

@section('custom-script')


@endsection
