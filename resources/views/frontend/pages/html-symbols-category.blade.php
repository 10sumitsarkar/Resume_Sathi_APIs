<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="ResumeSathi Logo">
    <title>{{ $category_data->meta_title }}</title>
    <meta name="description" content="{{ $category_data->meta_description }}">
    <meta name="keywords" content="{{ $category_data->meta_keyword }}">
    <link rel="canonical" href="{{ url($category_data->canonical_tag) }}" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="{{ $category_data->meta_title }}" />
    <meta property="og:description" content="{{ $category_data->meta_description }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="{{ url($category_data->canonical_tag) }}" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/prism.css') }}">
    <script src="{{ asset('dashboard-assets/vendors/js/prism.js') }}"></script>

    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}

     {{-- Schema start --}}
     <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url($category_data->canonical_tag) }}"
          },
          "headline": "{{ $category_data->meta_title }}",
          "description": "{{ $category_data->meta_description }}",
          "image": "{{ asset('front-assets/images/logos/og-images.png') }}",
          "author": {
            "@type": "Person",
            "name": "ResumeSathi"
          },

          "datePublished": "{{ $category_data->created_at->format('Y-m-d\TH:i:sP') }}"
        }
    </script>
    {{-- Schema start --}}

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
    <!-- Left Part Start -->
    <div class="sidebar-area">
        <button class="sidebar-collapse-btn"><img loading="lazy" src="{{ asset('front-assets/images/icons/collapse-btn.svg') }}" width="32"  height="32" alt="Collapse Button"></button>

        <h2 class="side-heading">SYMBOLS →</h2>
        <div class="sidebar-scroll-div">
            @foreach (getHtmlSymobolCategories() as $item)
                <a href="{{ url($item->canonical_tag) }}" class="sidebar-links">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- Left Part End -->

    <!-- Right Part Start -->
    <div class="right-content-area">
        <!-- Header Start -->
        <div class="common-container ps-4 ps-md-5">
            <h1 class="topics-heading text-start pb-3">{{ $category_data->name }}</h1>
            <p class="topics-heading-para">{{ $category_data->description }}</p>

            <!-- html entity cards start -->
            <div class="container-fluid px-0">
                <div class="row">
                    @foreach ($category_data->entities() as $symbol)
                        <div class="col-md-6 col-xl-4 mb-4">
                            <a href="{{ url($symbol->canonical_tag) }}" class="each-card-type-6">
                                <div class="entity-icon-div">
                                    {!! $symbol->html_code ?? $symbol->html_entity !!} <h3>{{ $symbol->name }}</h3>
                                </div>
                                <div class="html-entity-codes-div mt-2">
                                    <div>
                                        <label>UNICODE</label>
                                        <span>{{ $symbol->unicode }}</span>
                                    </div>
                                    <div>
                                        <label>HEX CODE</label>
                                        <span>{{ $symbol->hex_code }}</span>
                                    </div>
                                    <div>
                                        <label>HTML CODE</label>
                                        <span>{{ $symbol->html_code }}</span>
                                    </div>
                                    <div>
                                        <label>HTML ENTITY</label>
                                        <span>{{ $symbol->html_entity }}</span>
                                    </div>
                                    <div>
                                        <label>CSS CODE</label>
                                        <span>{{ $symbol->css_code }}</span>
                                    </div>
                                </div>
                                <button class="copy-code-btn">
                                    Copy code
                                    <span><img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-2.svg') }}"
                                            width="16" height="20" alt="Arrow"></span>
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- HTML entity cards end -->
        </div>
        <!-- Header End -->
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
    </script>
</body>

</html>
