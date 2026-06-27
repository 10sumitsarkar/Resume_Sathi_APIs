<html lang="zxx">

<head>
    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/resume-img/logos/favicon.png') }}"
        alt="W3CoderSchool Logo">
    <title>Free Online Resume Builder - Create Professional Resumes in Minutes</title>
    <meta name="description"
        content="Create a Job-Winning CV in Minutes with Our Free Resume Builder. Choose a Template and Build Your Resume Fast!">
    <meta name="keywords"
        content="free resume builder, online resume creator, professional resume templates, resume generator, create a resume for free, customizable resume templates, easy resume builder, build your resume online, free CV maker, resume design tool, downloadable resume templates, quick resume builder, best resume builder online, resume writing tool, resume formatting software">
    <link rel="canonical" href="https://www.w3coderschool.com/free-resume-builder" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Free Online Resume Builder - Create Professional Resumes in Minutes" />
    <meta property="og:description"
        content="Create a Job-Winning CV in Minutes with Our Free Resume Builder. Choose a Template and Build Your Resume Fast!" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/free-resume-builder" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/resume-home-css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/resume-home-css/responsive.css') }}">

    {{-- Schema start --}}
    <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "WebPage",
              "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://www.w3coderschool.com/free-resume-builder"
              },
              "headline": "Free Online Resume Builder - Create Professional Resumes in Minutes",
              "description": "Create a Job-Winning CV in Minutes with Our Free Resume Builder. Choose a Template and Build Your Resume Fast!",
              "image": "{{ asset('front-assets/images/logos/og-images.png') }}", 
              "author": {
                "@type": "Person",
                "name": "W3CoderSchool"
              }, 
             
              "datePublished": "2024-10-23T23:15:38+05:30"
            }
        </script>
    {{-- Schema start --}}

    {{-- Google analytics code start --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L3QP8NJR3K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-L3QP8NJR3K');
    </script>
    {{-- Google analytics code end --}}
</head>

<body class="light-version">
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <!-- ---------------------
    Top nav area start
---------------------- -->
    @include('frontend.layout.inc.header')

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area demo2 flex align-items-center mt-5">

        <div class="container">
            <div class="row align-items-center">
                <!-- Welcome Content -->
                <div class="col-12 col-lg-7">
                    <div class="welcome-content">
                        <h1>Free Online <span>CV Builder</span> with <span>Professional</span> Templates</h1>
                        <p>Create a Job-Winning CV in Minutes with Our Free Resume Builder. Choose a Template and Build
                            Your Resume Fast!</p>
                        <div class="dream-btn-group">
                            <a href="{{ route('resume') }}" class="btn dream-btn green-btn mr-3">Choose Template</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 mt-5 mt-lg-0">
                    <div class="banner-box text-center">
                        <img src="{{ asset('front-assets/images/resume-img/icons/resume.svg') }}" width="440"
                            height="431" class="img-fluid"
                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <div class="clearfix"></div>

    <section class="demo-video feat section-padding-100 bub-left">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="services-block-four">
                        <div class="inner-box">
                            <div class="icon-img-box">
                                <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/d1.webp') }}"
                                    width="64" height="64"
                                    alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                            </div>
                            <h3>Easy, Free Resume Builder</h3>
                            <div class="text">Quick and simple resume builder designed for job seekers. Build a
                                polished CV without the hassle.</div>

                        </div>
                    </div>
                    <div class="services-block-four">
                        <div class="inner-box">
                            <div class="icon-img-box">
                                <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/d2.webp') }}"
                                    width="64" height="64"
                                    alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                            </div>
                            <h3>Build Your Resume in Under 1 Minute</h3>
                            <div class="text">Create a professional resume quickly and easily. Our free resume builder
                                guides you step-by-step, helping you showcase your skills and experience in minutes.
                            </div>

                        </div>
                    </div>
                    <div class="services-block-four" style="margin-bottom:0">
                        <div class="inner-box">
                            <div class="icon-img-box">
                                <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/d3.webp') }}"
                                    width="64" height="64"
                                    alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                            </div>
                            <h3>Download Your Resume in PDF and Image Format</h3>
                            <div class="text">Easily download your completed resume in both PDF and image formats,
                                ready to share with employers instantly.</div>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6">
                    <div class="who-we-contant mt-s">
                        <h4>Why Choose Our Platform?</h4>
                        <p>Our free resume builder is designed to simplify the resume creation process, guiding you
                            step-by-step to a professional and eye-catching CV. Save time, avoid common mistakes, and
                            land your dream job with ease.</p>
                        <div class="list-wrap align-items-center">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon" width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">User-friendly interface</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon" width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">100% free to use</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon" width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">Professionally designed templates</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn dream-btn mt-30" href="{{ route('resume') }}">lets build your cv</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area clearfix">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-6">
                    <div class="who-we-contant">
                        <h4 class="bold">We Deliver The Best</h4>
                        <div class="list-wrap align-items-center">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon"width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">Proven Resume Templates to Boost Job Opportunities
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon"width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">Modern, Eye-Catching Template Designs</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon"width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">Easy-to-Use, No-Fuss Online CV Builder</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/resume-img/icons/check.svg') }}"
                                            class="check-mark-icon"width="30" height="30"
                                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                                        <div class="foot-c-info">Completely Free for All Users</div>
                                    </div>
                                </div>

                            </div>
                            <a class="btn dream-btn mt-3" href="{{ route('resume') }}">Create my resume</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="welcome-meter mt-s">
                        <img loading="lazy" src="{{ asset('front-assets/images/resume-img/cv.webp') }}"
                            class="img-fluid center-block" width="489" height="486"
                            alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Us Area End ##### -->

    {{-- <section class="demo ring-bg">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="bold">Our Creative Resume Templates</h2>
                <p>Explore modern, professional resume templates designed to stand out. Perfect for all industries, from corporate to creative fields.</p>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="demo-item">
                        <a href="/template-preview"><img loading="lazy" src="img/demos/demo-1.png" alt="demo"
                                class="img-responsive"></a>
                        <div class="preview-btn-wrapper text-center">
                            <a class="preview-demo" href="/template-preview">See template <i
                                    class="fa fa-long-arrow-right"></i></a>
                            <a class="preview-demo v2" href="/template-edit">Use template <i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="demo-item">
                        <a href="/template-preview"><img loading="lazy" src="img/demos/demo-2.png" alt="demo"
                                class="img-responsive"></a>
                        <div class="preview-btn-wrapper text-center">
                            <a class="preview-demo" href="/template-preview">See template <i
                                    class="fa fa-long-arrow-right"></i></a>
                            <a class="preview-demo v2" href="/template-edit">Use template <i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="demo-item">
                        <a href="/template-preview"><img loading="lazy" src="img/demos/demo-3.png" alt="demo"
                                class="img-responsive"></a>
                        <div class="preview-btn-wrapper text-center">
                            <a class="preview-demo" href="/template-preview">See template <i
                                    class="fa fa-long-arrow-right"></i></a>
                            <a class="preview-demo v2" href="/template-edit">Use template <i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section> --}}

    <!-- ##### Our features Area Start ##### -->
    <section class="our_services_area section-padding-100-70" id="services">
        <div class="container">

            <div class="section-heading text-center">
                <h2>Our Key Features</h2>
                <p>Our free resume builder offers powerful tools to make your CV look polished and professional,
                    increasing your chances of getting noticed.</p>
            </div>


            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <!-- Content -->
                    <div class="service_single_content text-center">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/f1.webp') }}"
                                width="64" height="64"
                                alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                        </div>
                        <h6>Proven Resume Templates</h6>
                        <p>Templates that have helped thousands land interviews.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <!-- Content -->
                    <div class="service_single_content text-center">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/f2.webp') }}"
                                width="64" height="64"
                                alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                        </div>
                        <h6>Modern, Stylish Design Options</h6>
                        <p>Eye-catching templates to fit your style and industry</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <!-- Content -->
                    <div class="service_single_content text-center">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/f3.webp') }}"
                                width="64" height="64"
                                alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                        </div>
                        <h6>Easy-to-Use Online CV Builder</h6>
                        <p>No experience needed; just fill in your details and download.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                    <!-- Content -->
                    <div class="service_single_content text-center">
                        <!-- Icon -->
                        <div class="service_icon">
                            <img loading="lazy" src="{{ asset('front-assets/images/resume-img/icons/f4.webp') }}"
                                width="64" height="64"
                                alt="Free Online Resume Builder - Create Professional Resumes in Minutes">
                        </div>
                        <h6>Completely Free</h6>
                        <p>Build your resume at no cost, anytime.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Our features Area End ##### -->

    <!-- footer area start -->
    <div class="mt-5"> @include('frontend.layout.inc.footer')</div>
    <!-- footer area end -->

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>

    @yield('page-js')
</body>

</html>
