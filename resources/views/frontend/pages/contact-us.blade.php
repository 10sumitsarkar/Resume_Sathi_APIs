@extends('frontend.layout.master')
@section('title', 'Contact Us')
@section('description', 'Master programming, coding, and tech skills through expert tutorials and hands-on projects. Explore our diverse courses designed for beginners to professionals. Start learning today!')
@section('keywords', 'programming tutorials, coding lessons, HTML, CSS, JavaScript, Python, web development, coding courses, tech skills, learn to code, web design, W3CoderSchool')
@section('canonical', 'https://www.w3coderschool.com/contact-us')
@section('og-title', 'Contact Us')
@section('og-description',
    'w3coderschool.com is the online platform where you can learn web development,programming,tech
    related article for free.')
@section('og-url', 'https://www.w3coderschool.com/contact-us')

@section('content')
    <!-- Header Start -->
    <div class="common-container pt-5">
        <h1 class="topics-heading">Contact <span>With Us</span></h1>
    </div>
    <!-- Header End -->
    <div class="common-container">
        <div class="container-fluid px-0">
            <div class="row contact_main_div">
                <!-- Left Part Start -->
                <div class="col-lg-8 mb-4">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Session::get('success'))
                                    <div class="demo-spacing-0">
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <div class="alert-body">
                                                {{ Session::get('success') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Session::get('fail'))
                                    <div class="demo-spacing-0">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="alert-body">
                                                {{ Session::get('fail') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form method="POST" action="">
                            @csrf
                            <div class="row contact_formInputs">
                                <div class="col-12 col-md-6  mb-3">
                                    <label for="first_name">First Name*</label>
                                    <input type="text" class="form-control" placeholder="Enter your first name *"
                                    value="{{ old('first_name') }}" name="first_name" id="first_name">
                                @if ($errors->has('first_name'))
                                    <label class="text-danger">{{ $errors->first('first_name') }}</label>
                                @endif
                                </div>
                                <div class="col-12 col-md-6  mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your last name"
                                        value="{{ old('last_name') }}" name="last_name" id="last_name">
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <label for="mail">Email*</label>
                                    <input type="text" class="form-control" placeholder="Enter your email *"
                                    value="{{ old('email') }}" name="email" id="mail">
                                @if ($errors->has('email'))
                                    <label class="text-danger">{{ $errors->first('email') }}</label>
                                @endif
                                </div>
                                <div class="col-12 col-md-6  mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" placeholder="Enter your phone"
                                        value="{{ old('phone_number') }}" name="phone_number" id="phone">
                                    @if ($errors->has('phone_number'))
                                        <label class="text-danger">Please enter a valid phone number.</label>
                                    @endif
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="Message">Message*</label>
                                    <textarea value="{{ old('message') }}" name="message" id="Message" class="form-control"
                                        placeholder="Write your message here... *"></textarea>
                                        @if ($errors->has('message'))
                                            <label class="text-danger">{{ $errors->first('message') }}</label>
                                        @endif
                                </div>
                            </div>
                            <button type="submit" class="btn form-control mt-3">Submit</button>
                        </form>

                    </div>
                </div>
                <!-- Left Part End -->

                <!-- Right Part Start -->
                <div class="col-lg-4 mb-4">
                    <div class="contact-left-div">
                        <div class="contact-left-head">
                            <h3>Quick Contact</h3>
                            <p>If you have any query, Use the following contact details to reach us.</p>
                        </div>
                        <!-- <div class="d-flex my-4">
                            <div>
                                <div class="quike_contact_img">
                                    <img loading="lazy" src="{{ asset('front-assets/images/icons/location.svg') }}" alt="Location">
                                </div>
                            </div>
                            <div class="quike_contact_div">
                                <h5>Address</h5>
                                <p>noida, sector 63 , uttar pradesh , 201301</p>
                            </div>
                        </div> -->
                        <div class="d-flex my-4">
                            <div>
                                <div class="quike_contact_img">
                                    <img loading="lazy" src="{{ asset('front-assets/images/icons/email.svg') }}" alt="Email">
                                </div>
                            </div>
                            <div class="quike_contact_div">
                                <h5>Email</h5>
                                <p><a href="mailto:edu@w3coderschool.com" aria-label="Email">edu@w3coderschool.com</a></p>
                            </div>
                        </div>
                        <div class="contact_social_icons_div">
                            <p>Follow us on:</p>
                            <div class="contact_social_icons">
                                <a href="https://www.facebook.com/w3coderschool/" aria-label="Facebook">
                                    <div>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/facebook.svg') }}" width="18"
                                            height="18" alt="Facebook">
                                    </div>
                                </a>
                                <a href="https://www.instagram.com/w3coderschool/" aria-label="Instagram">
                                    <div>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/instagram.svg') }}" width="18"
                                            height="18" alt="Instagram">
                                    </div>
                                </a>
                                <a href="https://in.pinterest.com/w3coderschool/" aria-label="Pinterest">
                                    <div>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/pinterest.svg') }}" width="18"
                                            height="18" alt="Pinterest">
                                    </div>
                                </a>
                                {{-- <a href="javascript:void(0)" aria-label="Play Store">
                                    <div>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/play-store.svg') }}" width="18"
                                            height="18" alt="Play Store">
                                    </div>
                                </a> --}}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Part End -->
            </div>
            <!-- Resume start -->
            @include('frontend.layout.inc.resume-banner')
            <!-- Resume end -->
        </div>
    </div>
    </section>
@endsection
