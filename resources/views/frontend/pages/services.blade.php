@extends('frontend.layout.master')
@section('title', 'Services')
@section('description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('keywords', 'programming tutorials, coding lessons, HTML, CSS, JavaScript, Python, web development, coding courses, tech skills, learn to code, web design, ResumeSathi')
@section('canonical', 'https://www.ResumeSathi.com/services')
@section('og-title', 'Services')
@section('og-description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('og-url', 'https://www.ResumeSathi.com/services')
@section('content')

    <!-- --------------------------
        Middle area StartS
    ------------------------------ -->

    <div class="container mb-5 mt-5">
        <section id="skill">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <div class="common_headings_div pb-2">
                            <h1>Our <span>Services</span></h1>
                            <div class="common_headings_mobArrow"><img loading="lazy"
                                    src="{{ asset('front-assets/images/icons/Arrow2.svg') }}" alt="ResumeSathi"
                                    title="ResumeSathi"> <img loading="lazy" src="{{ asset('front-assets/images/icons/Arrow1.svg') }}"
                                    alt="ResumeSathi" title="ResumeSathi"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="skill-as-designer border-shadow p-3">
                            <h4 class="text-center mb-2">Services As Designer</h4>
                            <dl class="row">
                                <dt class="col-sm-3 mt-2">HTML</dt>
                                <dd class="col-sm-9 mt-2"><span class="skill-bar html-bar"><span
                                            class="text-right d-block ms-2 animation-blink">87%</span></span></dd>
                                <dt class="col-sm-3 mt-2">CSS</dt>
                                <dd class="col-sm-9 mt-2">
                                    <span class="skill-bar css-bar"><span
                                            class="text-right d-block ms-2 animation-blink">78%</span></span>
                                </dd>
                                <dt class="col-sm-3 mt-2">BOOTSTRAP</dt>
                                <dd class="col-sm-9 mt-2"><span class="skill-bar bootstrap-bar"><span
                                            class="text-right d-block ms-2 animation-blink">94%</span></span></dd>
                                <dt class="col-sm-3 mt-2">JAVASCRIPT</dt>
                                <dd class="col-sm-9 mt-2"><span class="skill-bar javascript-bar"><span
                                            class="text-right d-block ms-2 animation-blink">73%</span></span></dd>
                                <dt class="col-sm-3 mt-2">JQUERY</dt>
                                <dd class="col-sm-9 mt-2">
                                    <span class="skill-bar jquery-bar"><span
                                            class="text-right d-block ms-2 animation-blink">90%</span></span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="skill-as-developer  p-3 border-shadow">
                            <h4 class="text-center mb-2 ">Services As Developer</h4>
                            <dl class="row">
                                <dt class="col-sm-3 mt-2">PHP</dt>
                                <dd class="col-sm-9 mt-2"><span class="skill-bar php-bar"><span
                                            class="text-right d-block ms-2 animation-blink">90%</span></span></dd>
                                <dt class="col-sm-3 mt-2">LARAVEL</dt>
                                <dd class="col-sm-9 mt-2">
                                    <span class="skill-bar laravel-bar"><span
                                            class="text-right d-block ms-2 animation-blink">80%</span></span>
                                </dd>
                                <dt class="col-sm-3 mt-2">AJAX</dt>
                                <dd class="col-sm-9 mt-2"><span class="skill-bar ajax-bar"><span
                                            class="text-right d-block ms-2 animation-blink">90%</span></span></dd>
                                <dt class="col-sm-3 mt-2">MYSQL</dt>
                                <dd class="col-sm-9 mt-2"><span class="skill-bar mysql-bar"><span
                                            class="text-right d-block ms-2 animation-blink">95%</span></span></dd>
                                <dt class="col-sm-3 mt-2">WORDPRESS</dt>
                                <dd class="col-sm-9 mt-2">
                                    <span class="skill-bar wordpress-bar"><span
                                            class="text-right d-block ms-2 animation-blink">90%</span></span>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('custom-script')
    <script>
        /******************************
           BOTTOM SCROLL TOP BUTTON start
           ******************************/
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
    </script>
@endsection
