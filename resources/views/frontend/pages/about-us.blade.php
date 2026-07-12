@extends('frontend.layout.master')
@section('title', 'About Us')
@section('description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('keywords',
    'web development,web designing,web tutorial,HTML tutoriaL,CSS tutoriaL,JavaScript
    tutoriaL,DOM,jQuery tutoriaL,PHP tutoriaL,SQL tutoriaL,XML,Bootstrap
    tutoriaL,Web,W3CSS,W3C,tutorials,programming,development,web programming,quiz,source code,tips,Laravel tutoriaL,JQUERY
    tutoriaL,ANGULAR tutoriaL,SEO,search engine optimization,html notes , css notes, bootstrap notes, javascript notes,php
    notes,laravel notes,WHAT IS HTML,WHAT IS MYSQL,WHAT IS PHP, WHAT IS JAVASCRIPT,WHAT IS CSS ,technology,blogging,blogging
    tips,blog,ResumeSathi')
@section('canonical', 'https://www.ResumeSathi.com/about-us')
@section('og-title', 'About Us')
@section('og-description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('og-url', 'https://www.ResumeSathi.com/about-us')

@section('content')
    <!-- Header Start -->
    <div class="common-container text-center pt-5">
        <h1 class="topics-heading pb-3">About <span>Us</span></h1>
        <p class="topics-heading-para">Welcome to ResumeSathi, your go-to destination for knowledge, skills, and innovation. We
            are a passionate team of educators, tech enthusiasts, and lifelong learners who have come together to create a
            platform that empowers individuals like you to thrive in the digital age.</p>
    </div>
    <!-- Header End -->
    <section class="each-category-section">
        <div class="container-fluid common-container py-5">
            <div class="row d-lg-flex align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <img loading="lazy" src="{{ asset('front-assets/images/mission.svg') }}" class="img-fluid" alt="Programming Tutorial"
                        width="658" height="480" loading="lazy">
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <h2>Our<span> Mission</span></h2>
                    <p class="para">At ResumeSathi, our mission is clear: to make learning accessible, engaging, and
                        rewarding for everyone. We believe that knowledge is the key to personal and professional growth,
                        and we're dedicated to providing the tools and resources you need to unlock your full potential.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="each-category-section bg-light-gray">
        <div class="container-fluid common-container py-5">
            <div class="row d-lg-flex align-items-center">
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <h2>What We <span>Offer</span></h2>
                    <ul class="what-weoffer-list">
                        <li><strong>Comprehensive Learning:</strong> Our platform offers a diverse range of courses and
                            tutorials, spanning
                            programming, web development, data science, design, and more. Whatever your interests or career
                            aspirations, we have something for you.</li>
                        <li><strong>Hands-On Experience:</strong> Learning is best when it's practical. That's why we
                            emphasize hands-on
                            projects and real-world applications, so you can apply what you've learned immediately.</li>
                        <li><strong>Expert Instructors:</strong> Our courses are taught by industry experts and experienced
                            educators who are
                            passionate about sharing their knowledge and helping you succeed.</li>
                        <li><strong>Community and Support:</strong> ResumeSathi is more than just a platform; it's a
                            community of learners.
                            Engage with fellow students, share experiences, and receive support from both our team and your
                            peers.</li>
                        <li><strong>Innovation:</strong> We stay at the forefront of technological advances, continually
                            updating and
                            expanding our course offerings to keep pace with the ever-evolving digital landscape.</li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center text-lg-end order-first order-lg-last">
                    <img loading="lazy" src="{{ asset('front-assets/images/what-we-offer.svg') }}" class="img-fluid"
                        alt="Code Snippets &amp; UI Kits" width="656" height="514" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <section class="each-category-section">
        <div class="container-fluid common-container py-5">
            <div class="row d-lg-flex align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <img loading="lazy" src="{{ asset('front-assets/images/why-choose-us.svg') }}" class="img-fluid"
                        alt="Programming Tutorial" width="658" height="480" loading="lazy">
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <h2>Why Choose<span> ResumeSathi?</span></h2>
                    <ul class="what-weoffer-list">
                        <li><strong>Quality:</strong> We are committed to providing high-quality educational content that's
                            both informative and engaging.</li>
                        <li><strong>Accessibility:</strong> Our platform is accessible anytime, anywhere, so you can learn
                            at your own pace.</li>
                        <li><strong>Affordability:</strong> Many of our resources are completely free, and we offer
                            affordable pricing for premium content.</li>
                        <li><strong>Career Advancement:</strong> Whether you're seeking a career change or advancement in
                            your current field, ResumeSathi can help you achieve your goals.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="common-container py-50 pt-4 ">
        <div class="about-join-us px-3">
            <h3>Join Us on Your Learning Journey</h3>
            <p class="px-0 px-md-5 mt-3 mb-0">No matter where you are in your educational or professional journey,
                ResumeSathi is here to support you. Together, we can embark on a lifelong quest for knowledge, innovation,
                and success. Join our community today and take the first step toward a brighter future.</p>
        </div>
    </div>


@endsection
