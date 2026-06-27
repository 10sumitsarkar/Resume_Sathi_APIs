@extends('frontend.layout.master')
@section('title', 'Learn Programming & Tech Skills Online')
@section('description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('keywords', 'programming tutorials, coding lessons, HTML, CSS, JavaScript, Python, web development, coding courses, tech skills, learn to code, web design, W3CoderSchool')
@section('canonical', 'https://www.w3coderschool.com/')
@section('og-title', 'All in One Platform for Learning & Skills')
@section('og-description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('og-url', 'https://www.w3coderschool.com/')

@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <!-- Hero start -->
    <section class="hero-section common-container py-5">
        <img src="{{ asset('front-assets/images/left-particles.png') }}" class="img-fluid hero-left-design" alt="Hero left design">
        <img src="{{ asset('front-assets/images/right-particles.png') }}" class="img-fluid hero-right-design" alt="Hero right design">
        <div class="container text-center mb-5 z-2 position-relative">
            <h1>Learn <span>Programming</span> & <span>Tech</span> Like a Pro</h1>
                    <p>Master coding and tech with expert tutorials, hands-on projects, and pro tips for all skill levels.
                    </p>
                    <div class="btn-div">
                        <a href="#startLearning" aria-label="Start Learning">Start Learning</a>
                        <a href="{{ route('contact-us') }}" aria-label="Contact Us">Contact Us</a>
                    </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- Development advertise start -->
    <section class="development-ads common-container mb-5">
        <div class="inner-div">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h2>Transform Your Online Presence</h2>
                        <p>Build your dream website now!</p>
                    </div>
                    <div class="col-lg-4 text-center mt-4 mt-lg-0 text-lg-end">
                        <a href="https://pixeltech.w3coderschool.com/" target="_blank" class="get-quote-btn" aria-label="Get a Quote">Get a Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Development advertise end -->

    <!-- Our course start  -->
    @if (our_courses() && our_courses()->isNotEmpty())
    <section class="our-courses common-container py-50">
        <div class="common-heading-div">
            <img loading="lazy" src="{{ asset('front-assets/images/icons/our-course.svg') }}" width="75" height="75" alt="Our course">
            <h2>Our <span>Courses</span></h2>
        </div>

        <div class="container-fluid px-0 mt-50">
            <div class="row justify-content-center">
                @foreach (our_courses() as $item)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ route('course', $item->id) }}" class="each-card-type-2"
                            aria-label="{{ $item->course_name }}" title="{{ $item->course_name }}">
                            <div class="top-header-div">
                                <div class="img-div">
                                    <img loading="lazy" src="{{ asset($item->course_image) }}" class="img-fluid" width="40"
                                        height="46" alt="{{ $item->course_name }}">
                                </div>
                                <h3>{{ $item->course_name }}</h3>
                            </div>
                            <p class="desc-para">{{ $item->description }}</p>

                            <button class="learning-btn">
                                Start learning
                                <span><img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-2.svg') }}" width="16" height="20" alt="Arrow"></span>
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- Our course end  -->

    <!-- Our tutorial start -->
    <section class="common-container py-50" id="startLearning">
        <div class="common-heading-div">
            <img loading="lazy" src="{{ asset('front-assets/images/icons/tutorials.svg') }}" width="75" height="75" alt="Programming Tutorials">
            <h2>Programming <span>Tutorials</span></h2>
        </div>


        <div class="container-fluid px-0 mt-50">
            <div class="row justify-content-center">
                @foreach (our_tutorials() as $item)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ route('our-tutorials', $item->url_name) }}" class="each-card-type-1"
                            aria-label="{{ $item->title }} Tutorial">
                            <div class="left-part">
                                <img loading="lazy" src="{{ asset($item->image) }}" class="img-fluid" width="36" height="42"
                                    alt="{{ $item->title }} Tutorial" title="{{ $item->title }} Tutorial">
                            </div>
                            <div class="right-part">
                                <h3>{{ $item->title }}</h3>
                                <button aria-label="{{ $item->title }} Tutorial">Learn Now <img src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Our tutorial end -->

    <!-- Code snippets ui start -->
    <section class="common-container py-50">
        <div class="common-heading-div">
            <img loading="lazy" src="{{ asset('front-assets/images/icons/code-snippets.svg') }}" width="75" height="75" alt="Code Snippets & UI Kits">
            <h2>Code <span>Snippets </span>&  <span>UI</span> Kits</h2>
        </div>
        <div class="container-fluid px-0 mt-50">
            <div class="row justify-content-center">
                @foreach (our_snipits() as $item)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mt-5 @if (in_array($item->title, ['HTML Course Code', 'CSS Course Code', 'JS Course Code'])) d-none @endif ">
                        <a href="{{ route('code-snipits', $item->url_name) }}" class="each-card-type-3"
                            aria-label="Code Snippets">
                            <div class="top-absolute-div">
                                <div class="img-div">
                                    <img loading="lazy" src="{{ asset('front-assets/images/icons/open-close-tag.svg') }}"
                                        class="img-fluid" width="40" height="46" alt="Open and Close Tag">
                                </div>
                            </div>
                            <h3 class="mb-5">{{ $item->title }}</h3>
                            {{-- <p class="desc-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                molestiae quas vel sint commodi epudiandae raesentium
                                optio, eaque rerum!</p> --}}
                            <button class="get-started-btn">Get started <img src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Code snippets ui end -->

    <!-- Html entity start -->
    <section class="common-container py-50">
        <div class="common-heading-div">
            <img loading="lazy" src="{{ asset('front-assets/images/icons/html-entity.svg') }}" width="75" height="75" alt="Code Snippets & UI Kits">
            <h2>Unicode, <span>Hex</span>, <span>HTML</span>, <span>CSS</span> Entities</h2>
        </div>

        <div class="container-fluid px-0 mt-50">
            <div class="row justify-content-center">
                @foreach (getHtmlSymbolCategories() as $item)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="{{ url($item->canonical_tag) }}" class="each-card-type-4"
                            aria-label="{{ $item->name }}">
                            <div class="top-div">
                                <div class="entity-icon-div">
                                    <p>{{ $item->symbol }}</p>
                                </div>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="desc-para">{{ $item->description }}</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Html entity end -->

    <!-- Tools start -->
    <section class="common-container py-50">
        <div class="common-heading-div">
            <img loading="lazy" src="{{ asset('front-assets/images/icons/tools.svg') }}" width="75" height="75" alt="Code Snippets & UI Kits">
            <h2>Free <span>Online</span> Tools</h2>
        </div>
        <div class="container-fluid px-0 mt-50">
            <div class="tools-tabs-div mb-3">
                <button class="active">Development</button>
                <button>Converter</button>
                <button>Calculator</button>
                <button>Utility</button>
            </div>
            <div class="tools-all-tabs-div">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('css-minifier') }}" class="each-card-type-5" aria-label="CSS Minifier">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/css-minifier.svg') }}" class="img-fluid"
                                    width="165" height="138" alt="CSS Minifier">
                            </div>
                            <h3>CSS Minifier</h3>
                            <p class="desc-para">A CSS Minifier reduces the size of CSS code by removing unnecessary spaces and
                                characters, making it load faster.</p>
                            <button class="get-started-btn">Get started <img loading="lazy"
                                    src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25"
                                    alt="Arrow"></button>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('gradient-maker') }}" class="each-card-type-5" aria-label="Gradient Generator">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/gradient-generator.svg') }}" class="img-fluid" width="165" height="138" alt="Gradient Generator">
                            </div>
                            <h3>Gradient Generator</h3>
                            <p class="desc-para">A Gradient Generator creates smooth transitions between colors for backgrounds
                                and designs.</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>                    
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('px-to-rem-converter') }}" class="each-card-type-5"
                            aria-label="PX ⇄ REM Converter">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/px-rem.svg') }}" width="162" height="132" alt="PX ⇄ REM Converter">
                            </div>
                            <h3>PX ⇄ REM Converter</h3>
                            <p class="desc-para">The PX ⇄ REM Converter is a tool designed to convert pixel (PX) values to rem (REM) units and vice versa</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('px-to-em-converter') }}" class="each-card-type-5" aria-label="PX ⇄ EM Converter">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/px-em.svg') }}" width="162" height="132" alt="PX ⇄ EM Converter">
                            </div>
                            <h3>PX ⇄ EM Converter</h3>
                            <p class="desc-para">The PX ⇄ EM Converter is a tool designed to convert pixel (PX) values to em (EM) units and vice versa. </p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('webp-converter') }}" class="each-card-type-5" aria-label="WEBP CONVERTER">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/to-webp.svg') }}" width="162" height="132" alt="PX ⇄ EM Converter">
                            </div>
                            <h3>WEBP Converter</h3>
                            <p class="desc-para">A WEBP Converter is a tool that converts images from various formats (like JPEG, PNG) into the WEBP format.</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('dev/animate-preview') }}" class="each-card-type-5" aria-label="WEBP CONVERTER">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/animate-css.svg') }}" width="162" height="132" alt="Animate.caa Preview">
                            </div>
                            <h3>Animation.css Preview</h3>
                            <p class="desc-para">Effortlessly test, customize, and visualize CSS animations in real time for seamless web development.</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('pdf-to-text') }}" class="each-card-type-5" aria-label="PDF to Text Converter">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/pdf-to-text-generator.svg') }}" class="img-fluid" width="161" height="137" alt="PDF to Text Converter">
                            </div>
                            <h3>PDF to Text Converter</h3>
                            <p class="desc-para">A PDF to Text Converter extracts and converts PDF content into editable text.
                            </p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('case-converter') }}" class="each-card-type-5" aria-label="Text Converter">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/text-converter.svg') }}" class="img-fluid" width="161" height="137" alt="Text Converter">
                            </div>
                            <h3>Text Converter</h3>
                            <p class="desc-para">A text converter changes text into different formats quickly and easily.</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('age-calculator') }}" class="each-card-type-5" aria-label="Age Calculator">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/age-calculator.svg') }}" width="162" height="132" alt="Age Calculator">
                            </div>
                            <h3>Age Calculator</h3>
                            <p class="desc-para">An age calculator quickly calculates your age based on your birthdate.</p>
                            <button class="get-started-btn">Get started <img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25" alt="Arrow"></button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                   
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('white-board') }}" class="each-card-type-5" aria-label="White Board">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/white-board.svg') }}" class="img-fluid"
                                    width="160" height="138" alt="White Board">
                            </div>
                            <h3>White Board</h3>
                            <p class="desc-para">An online whiteboard is a digital tool for writing, drawing in real-time. It
                                has features like adding text, images etc.</p>
                            <button class="get-started-btn">Get started <img
                                    src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25"
                                    alt="Arrow"></button>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <a href="{{ url('pincode-details') }}" class="each-card-type-5"
                            aria-label="Pincode Details Finder">
                            <div class="image-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/pincode-details.svg') }}" width="162"
                                    height="132" alt="Pincode Details Finder">
                            </div>
                            <h3>Pincode Details Finder</h3>
                            <p class="desc-para">A pincode details finder quickly show the pincode details</p>
                            <button class="get-started-btn">Get started <img loading="lazy"
                                    src="{{ asset('front-assets/images/icons/arrow-1.svg') }}" width="20" height="25"
                                    alt="Arrow"></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tools end -->

  <!-- Resume start -->
  @include('frontend.layout.inc.resume-banner')
  <!-- Resume end -->

@endsection
@section('custom-script')
<script>
           document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".tools-tabs-div button");
        const rows = document.querySelectorAll(".tools-all-tabs-div .row");

        function updateTab(index) {
            rows.forEach((row, i) => {
                row.style.display = i === index ? "flex" : "none";
            });

            buttons.forEach((button, i) => {
                button.classList.toggle("active", i === index);
            });
        }

        buttons.forEach((button, index) => {
            button.addEventListener("click", () => updateTab(index));
        });

        // Show first tab by default
        updateTab(0);
    });
</script>
@endsection
