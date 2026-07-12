<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="ResumeSathi Logo">
    <title>Unicode, Hex Code, HTML Code, HTML Entity and CSS Entity</title>
    <meta name="description"
        content="w3codingschool provide a collection of Unicode, Hex Code, HTML Code, HTML Entity and CSS Entity">
    <meta name="keywords" content="Unicode, Hex Code, HTML Code, HTML Entity, CSS Entity">

    <!--- OG meta tags start -->
    <meta property="og:title" content="Unicode, Hex Code, HTML Code, HTML Entity and CSS Entity" />
    <meta property="og:description"
        content="w3codingschool provide a collection of Unicode, Hex Code, HTML Code, HTML Entity and CSS Entity" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/prism.css') }}">
    <script src="{{ asset('dashboard-assets/vendors/js/prism.js') }}"></script>

    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}

        {{-- Google analytics code start --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L3QP8NJR3K"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());

     gtag('config', 'G-L3QP8NJR3K');
    </script>
    {{-- Google analytics code end --}}
</head>

<body>
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <!-- ---------------------
    Top nav area start
---------------------- -->
    @include('frontend.layout.inc.header')

    <!-- --------------------------
    Middle area Start
------------------------------ -->
    <div class="course_topics_mob my-2">
        <p data-bs-toggle="offcanvas" data-bs-target="#ourCourseOffcanvas" aria-controls="ourCourseOffcanvas">More <i
                class="fa-solid fa-angles-down"></i></p>
    </div>
    <section>
        <div class="course_lft_part">

            <div class="course_lft_scroll">
                <div class="course_lft_heading">
                    <h3>SYMBOLS →</h3>
                </div>

                @foreach (getHtmlSymobolCategories() as $item)
                    <a href="{{ url($item->canonical_tag) }}">
                        <div>
                            <h4>{{ $item->name }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="course_rght_part">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- ---------------------------
Article content area start
------------------------------ -->
                        <!-- Article image area start -->
                        <section class="inner-hero-section pt-0">
                            <div class="container-fluid">
                                <!-- Head area start -->
                                <div class="common_headings_div pb-2">
                                    <h2>Unicode, Hex Code, HTML Code, HTML Entity <span>&</span> CSS Entity</h2>
                                    <div class="common_headings_mobArrow"><img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/Arrow2.svg') }}" alt="w3codingschool"
                                            title="w3codingschool"> <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/Arrow1.svg') }}" alt="w3codingschool"
                                            title="w3codingschool"></div>
                                    <div class="common_head_paraDiv">
                                        <p class="htmlEntityEachPara mb-5">w3codingschool provide a collection of Unicode,
                                            Hex Code, HTML Code, HTML Entity and CSS Entity</p>
                                    </div>
                                </div>

                                <!-- Head area End -->
                                @foreach (getHtmlSymobolCategories() as $item)
                                    @if ($item->hasEntities())
                                        <div class="mb-3 htmlEntityAllCategoryHeading">
                                            <h2>{{ $item->name }}</h2>
                                            <a href="{{ url($item->canonical_tag) }}">View all</a>
                                        </div>
                                        <div class="row">
                                            <!--  -->
                                            @foreach ($item->entities(8) as $symbol)
                                                <div class="col-12 col-md-6 col-lg-4 pb-4">
                                                    <div class="html-unicode-main-div">

                                                        <div class="html-unicode-inner-div d-block">
                                                            <div class="symbol-card-overlay">
                                                                <a href="{{ url($symbol->canonical_tag) }}"><button>Copy
                                                                        Code</button></a>
                                                            </div>
                                                            <div class="html-unicode-img-div">
                                                                {!! $symbol->html_code ?? $symbol->html_entity !!}
                                                            </div>
                                                            <div class="html-unicode-code-div">
                                                                <div class="html-unicode-all-code-div">
                                                                    <div class="html-unicode-each-div">
                                                                        <p class="html-unicode-leftText-para">
                                                                            UNICODE<img loading="lazy"
                                                                                src="{{ asset('front-assets/images/icons/unicode-arrow.svg') }}"
                                                                                alt="arrow">
                                                                        </p>
                                                                        <div class="html-unicode-rightText-div">
                                                                            <p>{{ $symbol->unicode }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="html-unicode-each-div">
                                                                        <p class="html-unicode-leftText-para">HEX
                                                                            CODE<img loading="lazy"
                                                                                src="{{ asset('front-assets/images/icons/unicode-arrow.svg') }}"
                                                                                alt="arrow">
                                                                        </p>
                                                                        <div class="html-unicode-rightText-div">
                                                                            <p>{{ $symbol->hex_code }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="html-unicode-each-div">
                                                                        <p class="html-unicode-leftText-para">HTML
                                                                            CODE<img loading="lazy"
                                                                                src="{{ asset('front-assets/images/icons/unicode-arrow.svg') }}"
                                                                                alt="arrow">
                                                                        </p>
                                                                        <div class="html-unicode-rightText-div">
                                                                            <p>{{ $symbol->html_code }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="html-unicode-each-div">
                                                                        <p class="html-unicode-leftText-para">HTML
                                                                            ENTITY<img loading="lazy"
                                                                                src="{{ asset('front-assets/images/icons/unicode-arrow.svg') }}"
                                                                                alt="arrow">
                                                                        </p>
                                                                        <div class="html-unicode-rightText-div">
                                                                            <p>{{ $symbol->html_entity }}</p>

                                                                        </div>
                                                                    </div>
                                                                    <div class="html-unicode-each-div">
                                                                        <p class="html-unicode-leftText-para">CSS
                                                                            CODE<img loading="lazy"
                                                                                src="{{ asset('front-assets/images/icons/unicode-arrow.svg') }}"
                                                                                alt="arrow">
                                                                        </p>
                                                                        <div class="html-unicode-rightText-div">
                                                                            <p>{{ $symbol->css_code }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <h5 class="symbolNamePara mt-4">
                                                                        {{ $symbol->name }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!--  -->
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </section>
                        <!-- Article image area End -->
                    </div>
                </div>

            </div>


            <!-- footer area start -->
            @include('frontend.layout.inc.footer')
            <!-- footer area end -->
            <!-- offcanvas start -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="ourCourseOffcanvas"
                aria-labelledby="ourCourseOffcanvasLabel">
                <div class="offcanvas-header mb-0 pb-0">
                    <h3 id="ourCourseOffcanvasLabel">SYMBOLS →</h3>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="course_lft_scroll">
                        @foreach (getHtmlSymobolCategories() as $item)
                            <a href="{{ url($item->canonical_tag) }}">
                                <div class="{{ $item->canonical_tag }}">
                                    <h4>{{ $item->name }}</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- offcanvas end -->
            <div id="stop" class="scrollTop">
                <span><a href="#"><i class="fa-solid fa-arrow-turn-up text-white"></i></a></span>
            </div>

            <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
            <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>
            <script>
                $('.navbar-toggler').click(function() {
                    $('.navbar-toggler i').toggleClass('fa-bars')
                    $('.navbar-toggler i').toggleClass('fa-xmark')
                    $('header .navbar').toggleClass('nav_bar_bg_img')
                })
            </script>

            <script>
                var scrollTop = $(".scrollTop");
                $(window).scroll(function() {
                    var topPos = $(this).scrollTop();
                    if (topPos > 100) {
                        $(scrollTop).css("opacity", "1");
                    } else {
                        $(scrollTop).css("opacity", "0");
                    }
                });
                $(scrollTop).click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
                /******************************
                  BOTTOM SCROLL TOP BUTTON end
                 ******************************/
                $('.commentArea').click(function() {
                    $("#CommentModal").modal('show');
                })
                $(document).ready(function() {
                    $("#myModal").modal('show');
                });
            </script>
            <!-- ---------------------
    Javascript Area Start
---------------------- -->
</body>

</html>
