@extends('frontend.layout.master')
@section('title', 'Best of Health')
@section('description', 'Here, we share all the new and latest information and tips related to the Health')
@section('keywords', 'Wellness, Fitness, Nutrition, Healthy living, Mental health, Exercise, Weight loss, Healthy recipes, Holistic health, Prevention, Well-being, Medical advice, Health tips, Lifestyle choices, Self-care')
@section('canonical', 'https://www.ResumeSathi.com/health')
@section('og-title', 'Best of Health - ResumeSathi')
@section('og-description', 'Here, we share all the new and latest information and tips related to the Health')
@section('og-url', 'https://www.ResumeSathi.com/health')
@section('content')

    @php
        use Illuminate\Support\Carbon;
    @endphp
 <!-- Header Start -->
 <div class="common-container pt-5">
    <h1 class="topics-heading" >Best of <span>Health</span></h1>
</div>
<!-- Header End -->

<div class="common-container mt-5">
    <div class="container-fluid px-0">
        <div class="row">
            <!-- Left Part Start -->
            <div class="col-lg-8 col-xl-9">
                <div class="container-fluid px-0">
                    <div class="row">
                        @foreach ($articles as $article)
                        <div class="col-sm-6 col-lg-6 col-xl-4 mb-4 each-post-parent">
                            <a href="{{ url($article->canonical_tag) }}" class="each-posts-card" aria-label="{{ $article->article_title }}">
                                <div class="img-div">
                                    <img loading="lazy" src="{{ asset($article->hero_image) }}" class="img-fluid" alt="{{ $article->article_title }}" title="{{ $article->article_title }}">
                                    <div class="post-date-and-view">
                                        <p>
                                            <img loading="lazy" src="{{asset('front-assets/images/icons/post-date.svg')}}" alt="Date" title="Date">
                                            {{ Carbon::parse($article->created_at)->format('d M Y') }}
                                        </p>
                                        <p>
                                            <img loading="lazy" src="{{asset('front-assets/images/icons/post-view.svg')}}" alt="Views" title="Views">
                                            {{ $article->pageview }}
                                        </p>
                                    </div>
                                </div>
                                <h2>{{ $article->article_title }}</h2>
                                <p class="desc-para">{{ $article->meta_description }}</p>
                                <button class="learning-btn">
                                    Read more
                                    <span><img loading="lazy" src="{{asset('front-assets/images/icons/arrow-2.svg')}}" width="16" height="20" alt="Arrow"></span>
                                </button>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="pagination" class="post-pagination-container"></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Left Part End -->

            <!-- Right Part Start -->
            <div class="col-lg-4 col-xl-3">
                <!-- Google search Start -->
                <div class="right_search_input">
                    @include('frontend.layout.inc.sidebar-components.search-adsense')
                </div>
                <!-- Google search End -->

                <!-- Popular posts start -->
                @include('frontend.layout.inc.sidebar-components.popular-posts')
                <!-- Popular posts end -->

                <!-- Tutorial categories start -->
                @include('frontend.layout.inc.sidebar-components.tutorial-categories')
                <!-- Tutorial categories end -->
            </div>
            <!-- Right Part End -->
        </div>
        <!-- Resume start -->
        @include('frontend.layout.inc.resume-banner')
        <!-- Resume end -->
    </div>
</div>

@endsection
@section('custom-script')

@endsection
