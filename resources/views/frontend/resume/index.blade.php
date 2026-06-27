<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}"
        alt="W3CoderSchool Logo">
    <title>Free Online Resume Builder - Create Professional Resumes in Minutes</title>
    <meta name="description"
        content="Build your professional resume for free with our easy-to-use online resume builder. Choose from customizable templates and create your perfect resume in minutes. No registration required!">
    <meta name="keywords"
        content="free resume builder, online resume creator, professional resume templates, resume generator, create a resume for free, customizable resume templates, easy resume builder, build your resume online, free CV maker, resume design tool, downloadable resume templates, quick resume builder, best resume builder online, resume writing tool, resume formatting software">
    <link rel="canonical" href="https://www.w3coderschool.com/resume" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Free Online Resume Builder - Create Professional Resumes in Minutes" />
    <meta property="og:description"
        content="Build your professional resume for free with our easy-to-use online resume builder. Choose from customizable templates and create your perfect resume in minutes. No registration required!" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/resume" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/resume.css') }}">

    {{-- Schema start --}}
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://www.w3coderschool.com/resume"
          },
          "headline": "Free Online Resume Builder - Create Professional Resumes in Minutes",
          "description": "Build your professional resume for free with our easy-to-use online resume builder. Choose from customizable templates and create your perfect resume in minutes. No registration required!",
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

<body>
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <!-- ---------------------
    Top nav area start
---------------------- -->
    @include('frontend.layout.inc.header')

    <!-- Content Start -->
    <div class="common-container">
        <div class="form-main-container mt-5">
            <!-- FORMS -->
            <div id="qbox-container">
                <ol class="progress-step-bar">
                    <li class="active" data-step="1">
                        Template
                    </li>
                    <li data-step="2">
                        Personal
                    </li>
                    <li data-step="3">
                        Experience
                    </li>
                    <li data-step="4">
                        Education
                    </li>
                    <li data-step="5">
                        Skills
                    </li>
                    <li data-step="6">
                        Social
                    </li>
                    <li data-step="7">
                        Languages
                    </li>
                </ol>
                <form class="needs-validation" id="resumeForm">
                    <div id="steps-container">
                        <div class="step active">
                            <section class="hero-main-section">
                                <div class="container-fluid px-0 pb-0">
                                    <div class="row d-lg-flex align-items-center">
                                        <div class="col-12">
                                            <h1 class="resume-head">Choose a <span>Template</span></h1>
                                            <p class="resume-head-para">Let’s create your resume in minutes</p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="container-fluid px-0">
                                <div class="row justify-content-center templatesDiv">
                                    <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template1" class="position-relative">
                                            <input type="radio" name="template" id="template1"
                                                class="resume-tem-inp form-control validationClass" value="template1"
                                                hidden checked>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy"
                                                    src="{{ asset('front-assets/images/resume-img/template-1.webp') }}"
                                                    width="122.5" height="180" class="img-fluid" alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template2" class="position-relative">
                                            <input type="radio" name="template" id="template2"
                                                class="resume-tem-inp form-control validationClass" value="template2"
                                                hidden>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy"
                                                    src="{{ asset('front-assets/images/resume-img/template-2.webp') }}"
                                                    width="122.5" height="180" class="img-fluid"
                                                    alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template3" class="position-relative">
                                            <input type="radio" name="template" id="template3"
                                                class="resume-tem-inp form-control validationClass" value="template3"
                                                hidden>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy"
                                                    src="{{ asset('front-assets/images/resume-img/template-3.webp') }}"
                                                    width="122.5" height="180" class="img-fluid"
                                                    alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div>
                                     {{-- <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template4" class="position-relative">
                                            <input type="radio" name="template" id="template4"
                                                class="resume-tem-inp form-control validationClass" value="template4"
                                                hidden>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy" src="{{asset('front-assets/images/resume-img/demo-1.png')}}" class="img-fluid"
                                                    alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template5" class="position-relative">
                                            <input type="radio" name="template" id="template5"
                                                class="resume-tem-inp form-control validationClass" value="template5"
                                                hidden>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy" src="{{asset('front-assets/images/resume-img/demo-1.png')}}" class="img-fluid"
                                                    alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template6" class="position-relative">
                                            <input type="radio" name="template" id="template6"
                                                class="resume-tem-inp form-control validationClass" value="template6"
                                                hidden>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy" src="{{asset('front-assets//images/resume-img/demo-1.png')}}" class="img-fluid"
                                                    alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <label for="template7" class="position-relative">
                                            <input type="radio" name="template" id="template7"
                                                class="resume-tem-inp form-control validationClass" value="template7"
                                                hidden>
                                            <div class="check-tick">
                                                <svg width="15" height="11" viewBox="0 0 15 11"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 5.243L5.243 9.486L13.727 1" stroke="transparent"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="select-resume">
                                                <img loading="lazy" src="{{asset('front-assets/images/resume-img/demo-1.png')}}" class="img-fluid"
                                                    alt="Resume demo 1">
                                            </div>
                                        </label>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="step contact_main_div">
                            <section class="hero-main-section">
                                <div class="container-fluid px-0 pb-0">
                                    <div class="row d-lg-flex align-items-center">
                                        <div class="col-12">
                                            <h1 class="resume-head">Personal Details</h1>
                                            <p class="resume-head-para">Get started with the basics: your name and
                                                contact
                                                information.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="container-fluid px-0">
                                <div class="row contact_formInputs">
                                    <input type="text" hidden name="" id="base64">
                                    <input type="hidden" id="resumeIndex">
                                    <div class="col-12 mb-4">
                                        <div class="previewdiv mx-auto">
                                            <label class="imageUploadButtonDiv p-0" for="photo">
                                                <img loading="lazy"
                                                    src="{{ asset('front-assets/images/resume-img/resume-default-img-edit.svg') }}"
                                                    alt="profile image" class="img-fluid" width="20">
                                                <input type="file" id="photo" hidden accept="image/*">
                                            </label>
                                            <img loading="lazy"
                                                src="{{ asset('front-assets/images/resume-img/resume-default-img-outline.svg') }}"
                                                alt="profile image" class="img-fluid" width="200" height="200">
                                            <div class="imgpreviewdiv">
                                                <img loading="lazy"
                                                    src="{{ asset('front-assets/images/resume-img/resume-default-img.svg') }}"
                                                    id="picture" alt="profile image" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6  mb-4">
                                        <label for="name">Full Name <span>*</span></label>
                                        <input type="text" class="form-control validationClass"
                                            placeholder="Full Name" value="" name="name" id="name">
                                    </div>
                                    <div class="col-12 col-md-6  mb-4">
                                        <label for="email">Email Address <span>*</span></label>
                                        <input type="text" class="form-control validationClass"
                                            placeholder="Email Address" value="" name="email"
                                            id="email">
                                    </div>

                                    <div class="col-12 col-md-6 mb-4">
                                        <label for="phone">Phone <span>*</span></label>
                                        <input type="text" class="form-control validationClass"
                                            placeholder="Phone" value="" name="phone" id="phone">
                                    </div>
                                    <div class="col-12 col-md-6  mb-4">
                                        <label for="address">Address <span>*</span></label>
                                        <input type="text" class="form-control validationClass"
                                            placeholder="Address" value="" name="address" id="address">
                                    </div>
                                    <div class="col-12 col-md-6  mb-4">
                                        <label for="jobTitle">Desired job position</label>
                                        <input type="text" class="form-control"
                                            placeholder="Web Designer, Computer Operator" value=""
                                            name="jobTitle" id="jobTitle">
                                    </div>

                                    <div class="col-12 col-md-6  mb-4">
                                        <label for="aboutMe">About Me <span>*</span></label>
                                        <input type="text" class="form-control validationClass"
                                            placeholder="Write something about you" value="" name="aboutMe"
                                            id="aboutMe">
                                    </div>

                                    <div class="col-12 col-md-6  mb-4">
                                        <label for="websiteLink">Website</label>
                                        <input type="text" class="form-control" placeholder="www.example.com"
                                            value="" name="websiteLink" id="websiteLink">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step contact_main_div">
                            <div id="experienceFields">
                                <section class="hero-main-section">
                                    <div class="container-fluid px-0 pb-0">
                                        <div class="row d-lg-flex align-items-center">
                                            <div class="col-12">
                                                <h1 class="resume-head">Professional Experience</h1>
                                                <p class="resume-head-para">Tell us about your most recent job.</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="container-fluid px-0">
                                    <div class="row contact_formInputs">
                                        <div class="col-12 col-md-6  mb-4">
                                            <label for="name">Position Title <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="Web Designer, Computer Operator" value=""
                                                name="experienceTitle[]" id="name">
                                        </div>
                                        <div class="col-12 col-md-6  mb-4">
                                            <label for="companyName">Company Name <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="Company Name" value="" name="experienceCompany[]"
                                                id="companyName">
                                        </div>

                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="CompanyCity">City <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="City" value="" name="experienceCity[]"
                                                id="CompanyCity">
                                        </div>
                                        <div class="col-12 col-md-6  mb-4">
                                            <label for="companySatate">State <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="State" value="" name="experienceState[]"
                                                id="companySatate">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="workSummary">Work Summary</label>
                                            <textarea value="" name="experienceDescription[]" id="workSummary" class="form-control"
                                                placeholder="Work Summary"></textarea>
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="startDate">Start Date <span>*</span></label>
                                            <input type="month" class="form-control validationClass"
                                                placeholder="Start Date" value="" name="experienceFrom[]"
                                                id="startDate">
                                        </div>
                                        <div class="col-12 col-md-6  mb-4">
                                            <label for="endDate">End Date <span>*</span></label>
                                            <input type="month" class="form-control" placeholder="End Date"
                                                value="" name="experienceTo[]" id="endDate">

                                            <label for="currentlyWork" class="mt-2 d-flex align-items-center gap-1">
                                                <input type="checkbox" id="currentlyWork" class="w-auto"
                                                    onchange="currentlyWorkInp(this)"> I currently work here
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="resume-add-more-btn" onclick="addExperienceField()">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 8H8V13C8 13.55 7.55 14 7 14C6.45 14 6 13.55 6 13V8H1C0.45 8 0 7.55 0 7C0 6.45 0.45 6 1 6H6V1C6 0.45 6.45 0 7 0C7.55 0 8 0.45 8 1V6H13C13.55 6 14 6.45 14 7C14 7.55 13.55 8 13 8Z"
                                        fill="#aaa" />
                                </svg>
                                Add More Experience</button>
                        </div>
                        <div class="step contact_main_div">
                            <div id="educationFields">
                                <section class="hero-main-section">
                                    <div class="container-fluid px-0 pb-0">
                                        <div class="row d-lg-flex align-items-center">
                                            <div class="col-12">
                                                <h1 class="resume-head">Education</h1>
                                                <p class="resume-head-para">Add your most relevant education, including
                                                    programs
                                                    you're
                                                    currently enrolled in.</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="container-fluid px-0">
                                    <div class="row contact_formInputs">
                                        <div class="col-12 col-md-6  mb-4">
                                            <label for="collageName">School / Collage Name <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="School/Collage Name" value=""
                                                name="educationSchool[]" id="collageName">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="schoolLocation">School/Collage Location <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="School/Collage Location" value=""
                                                name="educationLocation[]" id="schoolLocation">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="educationField">Field of Study <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="Field of Study" value="" name="educationField[]"
                                                id="educationField">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="educationDegree">Degree <span>*</span></label>
                                            <input type="text" class="form-control validationClass"
                                                placeholder="Degree" value="" name="educationDegree[]"
                                                id="educationDegree">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="startDate">Start Date <span>*</span></label>
                                            <input type="month" class="form-control validationClass"
                                                placeholder="Start Date" value="" name="educationFrom[]"
                                                id="startDate">
                                        </div>
                                        <div class="col-12 col-md-6  mb-4">
                                            <label for="endDate">End Date</label>
                                            <input type="month" class="form-control" placeholder="End Date"
                                                value="" name="educationTo[]" id="endDate">
                                        </div>

                                        <div class="col-12 mb-4">
                                            <label for="educationSummary">Description</label>
                                            <textarea value="" name="educationDescription[]" id="educationSummary" class="form-control"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="resume-add-more-btn" onclick="addEducationField()">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 8H8V13C8 13.55 7.55 14 7 14C6.45 14 6 13.55 6 13V8H1C0.45 8 0 7.55 0 7C0 6.45 0.45 6 1 6H6V1C6 0.45 6.45 0 7 0C7.55 0 8 0.45 8 1V6H13C13.55 6 14 6.45 14 7C14 7.55 13.55 8 13 8Z"
                                        fill="#aaa" />
                                </svg>
                                Add More Education</button>
                        </div>
                        <div class="step contact_main_div">
                            <section class="hero-main-section">
                                <div class="container-fluid px-0 pb-0">
                                    <div class="row d-lg-flex align-items-center">
                                        <div class="col-12">
                                            <h1 class="resume-head">Key Skills</h1>
                                            <p class="resume-head-para">Add relevant professional key skills and
                                                proficiencies.</p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="container-fluid px-0">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="contact_formInputs" id="skillsSection">
                                            <label for="skills">Skills:</label>
                                            <div class="resume-skill-inp">
                                                <input class="form-control" type="text" id="skillInput"
                                                    placeholder="Skills">
                                                <button type="button" onclick="addSkill()">Add Skill</button>
                                            </div>
                                            <ul class="form-list-preview" id="skillsList"> </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step contact_main_div">
                            <div id="socialFields">
                                <section class="hero-main-section">
                                    <div class="container-fluid px-0">
                                        <div class="row d-lg-flex align-items-center">
                                            <div class="col-12">
                                                <h1 class="resume-head">Social Links</h1>
                                                <p class="resume-head-para">Add your social link here</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="container-fluid px-0 py-0">
                                    <div class="row contact_formInputs">
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="socialName">Social Name</label>
                                            <input type="text" class="form-control" placeholder="Social Name"
                                                value="" name="socialName[]" id="socialName">
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <label for="socialLink">Links</label>
                                            <input type="text" class="form-control" placeholder="Social Link"
                                                value="" name="socialLink[]" id="socialLink">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="resume-add-more-btn" onclick="addSocialField()">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 8H8V13C8 13.55 7.55 14 7 14C6.45 14 6 13.55 6 13V8H1C0.45 8 0 7.55 0 7C0 6.45 0.45 6 1 6H6V1C6 0.45 6.45 0 7 0C7.55 0 8 0.45 8 1V6H13C13.55 6 14 6.45 14 7C14 7.55 13.55 8 13 8Z"
                                        fill="#aaa" />
                                </svg>
                                Add More Links</button>
                        </div>
                        <div class="step contact_main_div">
                            <section class="hero-main-section">
                                <div class="container-fluid px-0 pb-0">
                                    <div class="row d-lg-flex align-items-center">
                                        <div class="col-12">
                                            <h1 class="resume-head">Languages</h1>
                                            <p class="resume-head-para">Add languages you know</p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="container-fluid px-0">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="contact_formInputs" id="languagesSection">
                                            <label for="languages">Languages:</label>
                                            <div class="resume-language-inp">
                                                <input class="form-control" type="text" id="languageInput"
                                                    placeholder="Languages">
                                                <button type="button" onclick="addLanguage()">Add Language</button>
                                            </div>
                                            <ul class="form-list-preview" id="languagesList"> </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="q-box__buttons">
                        <button id="prev-btn" type="button" onclick="prevBtn()" disabled>Previous</button>
                        <button id="next-btn" type="button" onclick="nextBtn()">Next</button>
                        <button id="saveButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- After success  -->
        <div id="success" class="success-message">
            <div class="my-5">
                <div class="container">
                    <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
                        <circle cx="38" cy="38" r="36" />
                        <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round"
                            stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7" />
                    </svg>
                    <h1 class="success-message__title">Resume Saved Successfully</h1>
                    <div class="success-message__content">
                        <p>Your resume has been saved successfully. You can view your resumes by clicking the button
                            below.
                        </p>
                    </div>
                </div>
                <a class="back-link" href="">View Your Resumes &rarr;</a>
            </div>
        </div>
    </div>

    <!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    <div class="common-container">
        <div class="all-saved-resume">
            <section class="hero-main-section">
                <div class="container-fluid px-0 pb-0">
                    <div class="row d-lg-flex align-items-center">
                        <div class="col-12">
                            <h1 class="resume-head">Your Resumes</h1>
                            <p class="resume-head-para">Select Your Resume and Land Your Dream Job</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid px-0">


                <div class="row" id="savedResumes"></div>

            </div>
        </div>
    </div>



    <!-- Floating create new resume button -->
    <button class="create-button" id="create-new-resume">
        <svg width="24" height="24" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M5.5 0.75C5.5 0.551088 5.42098 0.360322 5.28033 0.21967C5.13968 0.0790177 4.94891 0 4.75 0C4.55109 0 4.36032 0.0790177 4.21967 0.21967C4.07902 0.360322 4 0.551088 4 0.75V4H0.75C0.551088 4 0.360322 4.07902 0.21967 4.21967C0.0790177 4.36032 0 4.55109 0 4.75C0 4.94891 0.0790177 5.13968 0.21967 5.28033C0.360322 5.42098 0.551088 5.5 0.75 5.5H4V8.75C4 8.94891 4.07902 9.13968 4.21967 9.28033C4.36032 9.42098 4.55109 9.5 4.75 9.5C4.94891 9.5 5.13968 9.42098 5.28033 9.28033C5.42098 9.13968 5.5 8.94891 5.5 8.75V5.5H8.75C8.94891 5.5 9.13968 5.42098 9.28033 5.28033C9.42098 5.13968 9.5 4.94891 9.5 4.75C9.5 4.55109 9.42098 4.36032 9.28033 4.21967C9.13968 4.07902 8.94891 4 8.75 4H5.5V0.75Z"
                fill="#fff" />
        </svg>

    </button>

    <!-- Floating back to all resume button -->
    <button class="back-to-button d-none" id="back-all-resume">

        <svg width="28" height="28" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1.99997 5.00194L1.64647 5.35544L1.29297 5.00194L1.64647 4.64844L1.99997 5.00194ZM10.5 9.00194C10.5 9.13455 10.4473 9.26172 10.3535 9.35549C10.2598 9.44926 10.1326 9.50194 9.99997 9.50194C9.86736 9.50194 9.74018 9.44926 9.64641 9.35549C9.55265 9.26172 9.49997 9.13455 9.49997 9.00194H10.5ZM4.14647 7.85544L1.64647 5.35544L2.35347 4.64844L4.85347 7.14844L4.14647 7.85544ZM1.64647 4.64844L4.14647 2.14844L4.85347 2.85544L2.35347 5.35544L1.64647 4.64844ZM1.99997 4.50194H6.99997V5.50194H1.99997V4.50194ZM10.5 8.00194V9.00194H9.49997V8.00194H10.5ZM6.99997 4.50194C7.92823 4.50194 8.81846 4.87069 9.47484 5.52706C10.1312 6.18344 10.5 7.07368 10.5 8.00194H9.49997C9.49997 7.3389 9.23658 6.70301 8.76774 6.23417C8.29889 5.76533 7.66301 5.50194 6.99997 5.50194V4.50194Z"
                fill="#fff" />
        </svg>

    </button>
    <!-- footer area start -->
    <div class="mt-5"> @include('frontend.layout.inc.footer')</div>
    <!-- footer area end -->

    {{-- Delete Confirmation modal start --}}
    <div class="modal fade warning-modal" id="warningModal" tabindex="-1" data-bs-backdrop='static'
        aria-labelledby="rulesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <svg class="mx-auto d-block" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z"
                            fill="#e20022"></path>
                    </svg>
                    <p class="head">Are you sure you want to <br> delete this?</p>
                    <p class="warning-para">This action cannot be undone. Once deleted, all associated data will be
                        permanently removed. Please confirm if you wish to proceed.</p>
                    <div class="actions-btns">
                        <button class="btn yes-btn" onclick="deleteElement()">Yes, Delete</button>
                        <button class="btn cancel-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Confirmation modal end --}}

    {{-- Delete Resume Confirmation modal start --}}
    <div class="modal fade warning-modal" id="warningResumeModal" tabindex="-1" data-bs-backdrop='static'
        aria-labelledby="rulesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <svg class="mx-auto d-block" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z"
                            fill="#e20022"></path>
                    </svg>
                    <p class="head">Are you sure you want to <br> delete this resume?</p>
                    <p class="warning-para">This action cannot be undone. Once deleted, all associated data will be
                        permanently removed. Please confirm if you wish to proceed.</p>
                    <div class="actions-btns">
                        <button class="btn yes-btn">Yes, Delete</button>
                        <button class="btn cancel-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Resume Confirmation modal end --}}

    {{-- Delete Skill Confirmation modal start --}}
    <div class="modal fade warning-modal" id="warningSkillModal" tabindex="-1" data-bs-backdrop='static'
        aria-labelledby="rulesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <svg class="mx-auto d-block" width="75" height="75" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 4C7 3.46957 7.21071 2.96086 7.58579 2.58579C7.96086 2.21071 8.46957 2 9 2H15C15.5304 2 16.0391 2.21071 16.4142 2.58579C16.7893 2.96086 17 3.46957 17 4V6H21C21.2652 6 21.5196 6.10536 21.7071 6.29289C21.8946 6.48043 22 6.73478 22 7C22 7.26522 21.8946 7.51957 21.7071 7.70711C21.5196 7.89464 21.2652 8 21 8H19.931L19.064 20.142C19.0281 20.6466 18.8023 21.1188 18.4321 21.4636C18.0619 21.8083 17.5749 22 17.069 22H6.93C6.42414 22 5.93707 21.8083 5.56688 21.4636C5.1967 21.1188 4.97092 20.6466 4.935 20.142L4.07 8H3C2.73478 8 2.48043 7.89464 2.29289 7.70711C2.10536 7.51957 2 7.26522 2 7C2 6.73478 2.10536 6.48043 2.29289 6.29289C2.48043 6.10536 2.73478 6 3 6H7V4ZM9 6H15V4H9V6ZM6.074 8L6.931 20H17.07L17.927 8H6.074ZM10 10C10.2652 10 10.5196 10.1054 10.7071 10.2929C10.8946 10.4804 11 10.7348 11 11V17C11 17.2652 10.8946 17.5196 10.7071 17.7071C10.5196 17.8946 10.2652 18 10 18C9.73478 18 9.48043 17.8946 9.29289 17.7071C9.10536 17.5196 9 17.2652 9 17V11C9 10.7348 9.10536 10.4804 9.29289 10.2929C9.48043 10.1054 9.73478 10 10 10ZM14 10C14.2652 10 14.5196 10.1054 14.7071 10.2929C14.8946 10.4804 15 10.7348 15 11V17C15 17.2652 14.8946 17.5196 14.7071 17.7071C14.5196 17.8946 14.2652 18 14 18C13.7348 18 13.4804 17.8946 13.2929 17.7071C13.1054 17.5196 13 17.2652 13 17V11C13 10.7348 13.1054 10.4804 13.2929 10.2929C13.4804 10.1054 13.7348 10 14 10Z"
                            fill="#e20022"></path>
                    </svg>
                    <p class="head">Are you sure you want to <br> delete this skill?</p>
                    <p class="warning-para">This action cannot be undone. Once deleted, all associated data will be
                        permanently removed. Please confirm if you wish to proceed.</p>
                    <div class="actions-btns">
                        <button class="btn yes-btn">Yes, Delete</button>
                        <button class="btn cancel-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Skill Confirmation modal end --}}


    <!-- Bootstrap Modal -->
<div class="modal fade" id="editSkillModal" tabindex="-1" aria-labelledby="editSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSkillModalLabel">Edit Skill</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="skillModalInput" placeholder="Enter new skill">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="skillModalSaveButton" onclick="saveEditedSkill()">Save</button>
        </div>
      </div>
    </div>
  </div>
  

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/resume.min.js') }}"></script>
    @yield('page-js')
    <script>
        // Select the month input element
        const endDateInput = document.getElementById('endDate');

        // Function to handle the checkbox change event
        function currentlyWorkInp(checkbox) {
            if (checkbox.checked) {
                // Disable the month input if the checkbox is checked
                endDateInput.disabled = true;
                // Optionally, clear the value of the month input
                endDateInput.value = '';
            } else {
                // Enable the month input if the checkbox is unchecked
                endDateInput.disabled = false;
            }
        }
    </script>
    <script>
        let submitBtn = document.getElementById('saveButton');
        let preloader = document.getElementById('preloader-wrapper');
        let bodyElement = document.querySelector('body');
        let succcessDiv = document.getElementById('success');

        function scrollTopFun() {
            // Scroll top on click
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // This adds a smooth scrolling effect
            });
        }

        submitBtn.addEventListener('click', () => {
            preloader.classList.add('d-block');
            document.getElementById('create-new-resume').classList.add('d-none')

            const timer = ms => new Promise(res => setTimeout(res, ms));

            timer(3000)
                .then(() => {
                    bodyElement.classList.add('loaded');
                }).then(() => {
                    submitBtn.classList.remove('d-inline-block');
                    submitBtn.classList.add('d-none');
                    succcessDiv.classList.remove('d-none');
                    succcessDiv.classList.add('d-block');
                })

        });


        var allSteps = document.querySelectorAll('.step');
        let currentStep = 0;



        function showFormStep(formStep) {
            allSteps.forEach((eachFormStep, index) => {
                eachFormStep.classList.toggle('active', index == formStep);
            })

            document.getElementById('prev-btn').disabled = formStep == 0;
            if (formStep == allSteps.length - 1) {
                document.getElementById('next-btn').style.display = 'none';
                document.getElementById('saveButton').style.display = 'block';
            } else {
                document.getElementById('next-btn').style.display = 'block';
                document.getElementById('saveButton').style.display = 'none';
            }
        }

        function progressActive() {
            const allProgreshDiv = document.querySelectorAll('.progress-step-bar li');
            allProgreshDiv.forEach((eachAllProgreshDiv) => {
                eachAllProgreshDiv.classList.remove('active')
            })
            allProgreshDiv[currentStep].classList.add('active')

            for (var i = 0; i < currentStep; i++) {
                allProgreshDiv[i].classList.add('completed')
            }
            allProgreshDiv[currentStep].classList.remove('completed')
        }

        function nextBtn() {
            var allinputeIneachStep = allSteps[currentStep].querySelectorAll('.validationClass');
            let allFilled = true;

            allinputeIneachStep.forEach((eachInput) => {
                if (eachInput.value === '') {
                    allFilled = false;
                    eachInput.style.border = '1px solid #ff0073'
                } else {
                    eachInput.style.border = '1px solid transparent'
                }
            });

            if (allFilled) {
                if (currentStep < allSteps.length - 1) { // Allow navigation to the last step
                    currentStep++;
                    showFormStep(currentStep);
                }
                scrollTopFun()
            } else {
                alert('Fill all required field')
            }

            progressActive()

        }


        function prevBtn() {
            if (currentStep >= 1) {
                currentStep--
                showFormStep(currentStep)
                scrollTopFun()
            } else {}
            progressActive()
        }

        var allFormControl = document.querySelectorAll('.form-control');
        allFormControl.forEach((eachAllFormControl) => {
            eachAllFormControl.addEventListener('input', (event) => { // Arrow function
                if (event.target.value === '') {
                    event.target.style.border = '1px solid #ff0073';
                } else {
                    event.target.style.border = '1px solid transparent';
                }
            });
        });
    </script>

    <script>
        let elementToDelete = null; // Variable to store the reference of the element to delete

        function confirmAndRemove(element) {
            // Save the element to delete
            elementToDelete = element.closest('.commonAccess');

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('warningModal'));
            modal.show();
        }

        function deleteElement() {
            if (elementToDelete) {
                // Remove the saved element
                elementToDelete.remove();
                elementToDelete = null; // Clear the reference

                // Close the modal
                const modalElement = document.getElementById('warningModal');
                const modalInstance = bootstrap.Modal.getInstance(modalElement); // Get the modal instance
                modalInstance.hide(); // Hide the modal
            }
        }
    </script>
</body>

</html>
