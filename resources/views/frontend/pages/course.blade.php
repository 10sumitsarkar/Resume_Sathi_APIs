<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="W3CoderSchool Logo">
    <title>{{ $course->meta_title }}</title>
    <meta name="description" content="{{ $course->meta_description }}">
    <meta name="keywords" content="{{ $course->meta_keyword }}">
    <link rel="canonical" href="{{ url($course->canonical_tag) }}" />
    <!--- OG meta tags start -->
    <meta property="og:title" content="{{ $course->meta_title }}" />
    <meta property="og:description" content="{{ $course->meta_description }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="{{ url($course->canonical_tag) }}" />
    <!--- OG meta tags end -->
    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <!-- google font and font awesome CDN -->
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

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url($course->canonical_tag) }}"
          },
          "headline": "{{ $course->meta_title }}",
          "description": "{{ $course->meta_description }}",
          "image": "{{asset($course->hero_image)}}", 
          "author": {
            "@type": "Person",
            "name": "{{ $course->user->first_name }} {{ $course->user->last_name }}"
          }, 
         
          "datePublished": "{{ $course->created_at->format('Y-m-d\TH:i:sP') }}"
        }
    </script>
</head>

<body>
    @php
        use Illuminate\Support\Carbon;
    @endphp
    @include('frontend.layout.inc.header')


    <!-- Left Part Start -->
    <div class="sidebar-area">
        <button class="sidebar-collapse-btn"><img loading="lazy" src="{{ asset('front-assets/images/icons/collapse-btn.svg') }}" width="32" height="32" alt="Collapse Button"></button>

        <h3 class="side-heading">{{ $course->course_category->course_name }}</h3>
        <div class="sidebar-scroll-div">
            @foreach ($related as $item)
                <a href="{{ url($item->canonical_tag) }}"
                    class="sidebar-links {{ $course->canonical_tag === $item->canonical_tag ? 'active' : '' }}">{{ $item->topic_name }}</a>
            @endforeach
        </div>
    </div>
    <!-- Left Part End -->
    <!-- Right Part Start -->
    <div class="right-content-area">
        <div class="common-container ps-4 ps-md-5">
            <h1 class="topics-heading" id="button-focused">{{ $course->topic_name }}</h1>
            <div class="article-details-div">
                <div class="left-part">
                    <p><img loading="lazy" src="{{asset('front-assets/images/icons/single-post-author.svg')}}" alt="Author">{{ $course->user->first_name }} {{ $course->user->last_name }}</p>
                    <p><img loading="lazy" src="{{asset('front-assets/images/icons/single-post-date.svg')}}" alt="Date">{{ Carbon::parse($course->created_at)->format('d M Y') }}</p>
                </div>
                <div class="right-part">
                    <p><img loading="lazy" src="{{asset('front-assets/images/icons/single-post-category.svg')}}" alt="Category">{{ $course->course_category->course_name }}</p>
                </div>
            </div>
            <div class="article-content-div my-4">
                <p>{!! $course->content->content !!}</p>
            </div>
        </div>
        <!-- Right Part End -->
        <!-- Resume start -->
        @include('frontend.layout.inc.resume-banner')
        <!-- Resume end -->
        <!-- Footer Start -->
        @include('frontend.layout.inc.footer')
        <!-- Footer End -->
    </div>
    <!-- Right Part End -->


    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>
    @yield('page-js')
    <script>
        // Sidebar collapse start
        const sidebarBtn = document.querySelector('.sidebar-collapse-btn')
        if (sidebarBtn) {
            sidebarBtn.addEventListener('click', (e) => {
                const sideBarDiv = e.target.closest('.sidebar-area')
                if (sideBarDiv.classList.contains("collapsed")) {
                    e.target.closest('.sidebar-area').classList.remove('collapsed')
                } else {
                    e.target.closest('.sidebar-area').classList.add('collapsed')
                }

            })
        }

        // Sidebar not show when screen size less than 992px start
        function toggleSidebarOnResize() {
            const sidebar = document.querySelector('.sidebar-area');
            if (window.innerWidth < 991) {
                sidebar.classList.add('collapsed');
            } else {
                sidebar.classList.remove('collapsed');
            }
        }
        // Run on page load and on window resize
        window.addEventListener('load', toggleSidebarOnResize);
        window.addEventListener('resize', toggleSidebarOnResize);
        // Sidebar collapse end

        // Incontent Output start
        var mainOutputDiv = document.querySelectorAll('.each-output-div');
        mainOutputDiv.forEach(function(eachMainOutputDiv) {
            var code = eachMainOutputDiv.querySelector('.htmlCssJsCode').value;
            var outputDiv = eachMainOutputDiv.querySelector('.output');
            outputDiv.innerHTML = '';
            var iframe = document.createElement('iframe');
            iframe.setAttribute('sandbox', 'allow-same-origin allow-scripts allow-popups allow-modals');
            outputDiv.appendChild(iframe);
            var iframeDocument = iframe.contentWindow.document;
            iframeDocument.open();
            iframeDocument.write(code);
            iframeDocument.close();
        })
        // Incontent Output end
    </script>

</body>

</html>
