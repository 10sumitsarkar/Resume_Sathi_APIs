<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="W3CoderSchool Logo">
    <title>{{ $singleSymbols->meta_title }}</title>
    <meta name="description" content="{{ $singleSymbols->meta_description }}">
    <meta name="keywords" content="{{ $singleSymbols->meta_keyword }}">
    <link rel="canonical" href="{{ url($singleSymbols->canonical_tag) }}" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="{{ $singleSymbols->meta_title }}" />
    <meta property="og:description" content="{{ $singleSymbols->meta_description }}" />
    <meta property="og:type" content="singleSymbols" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="{{ url($singleSymbols->canonical_tag) }}" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/prism.css') }}">
    <script src="{{ asset('dashboard-assets/vendors/js/prism.js') }}"></script>

     {{-- Schema start --}}
     <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url($singleSymbols->canonical_tag) }}"
          },
          "headline": "{{ $singleSymbols->meta_title }}",
          "description": "{{ $singleSymbols->meta_description }}",
          "image": "{{ asset('front-assets/images/logos/og-images.png') }}", 
          "author": {
            "@type": "Person",
            "name": "W3CoderSchool"
          }, 
         
          "datePublished": "{{ $singleSymbols->created_at->format('Y-m-d\TH:i:sP') }}"
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

    @include('frontend.layout.inc.header')
    <!-- Left Part Start -->
    <div class="sidebar-area">
        <button class="sidebar-collapse-btn"><img src="{{ asset('front-assets/images/icons/collapse-btn.svg') }}"
              width="32"  height="32" alt="Collapse Button"></button>

        <h2 class="side-heading">SYMBOLS →</h2>
        <div class="sidebar-scroll-div">
            @foreach (getHtmlSymobolCategories() as $item)
                <a href="{{ url($item->canonical_tag) }}" class="sidebar-links" aria-label="Html Entities">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- Left Part End -->

    <!-- Right Part Start -->
    <div class="right-content-area">
        <!-- Header Start -->
        <div class="common-container ps-4 ps-md-5">
            <h1 class="topics-heading text-start pb-3">{{ $singleSymbols->name }}</h1>
            <p class="topics-heading-para">{{ $singleSymbols->name }} HTML Symbol, Character and EntityCodes</p>

            <!-- html entity cards start -->
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="each-card-type-6 each-html-entity-left">
                            <div class="entity-icon-div">
                                <h3>{{ $singleSymbols->name }}</h3>
                            </div>
                            <div class="html-entity-codes-div mt-2">
                                <div>
                                    <label>UNICODE</label>
                                    <div class="entity-value-div">
                                        <input type="text" value="{{ $singleSymbols->unicode }}" aria-label="Entities" readonly>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/copy-icon.svg') }}"
                                            class="copyTxtBtn" width="20" height="20" alt="Copy Entity"
                                            title="Copy">
                                        <div class="copy-noty-div">
                                            Copied
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label>HEX CODE</label>
                                    <div class="entity-value-div">
                                        <input type="text" value="{{ $singleSymbols->hex_code }}" aria-label="Entities" readonly>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/copy-icon.svg') }}"
                                            class="copyTxtBtn" width="20" height="20" alt="Copy Entity"
                                            title="Copy">
                                        <div class="copy-noty-div">
                                            Copied
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label>HTML CODE</label>
                                    <div class="entity-value-div">
                                        <input type="text" value="{{ $singleSymbols->html_code }}" aria-label="Entities" readonly>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/copy-icon.svg') }}"
                                            class="copyTxtBtn" width="20" height="20" alt="Copy Entity"
                                            title="Copy">
                                        <div class="copy-noty-div">
                                            Copied
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label>HTML ENTITY</label>
                                    <div class="entity-value-div">
                                        <input type="text" value="{{ $singleSymbols->html_entity }}" aria-label="Entities" readonly>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/copy-icon.svg') }}"
                                            class="copyTxtBtn" width="20" height="20" alt="Copy Entity"
                                            title="Copy">
                                        <div class="copy-noty-div">
                                            Copied
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label>CSS CODE</label>
                                    <div class="entity-value-div">
                                        <input type="text" value="{{ $singleSymbols->css_code }}" aria-label="Entities" readonly>
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/copy-icon.svg') }}"
                                            class="copyTxtBtn" width="20" height="20" alt="Copy Entity"
                                            title="Copy">
                                        <div class="copy-noty-div">
                                            Copied
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="each-card-type-6 each-html-entity-right">
                            <div class="entity-icon-div h-100">
                                {!! $singleSymbols->html_code ?? $singleSymbols->html_entity !!}
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('front-assets/js/custom.js') }}"></script>
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

    <script>
        var copyBtns = document.querySelectorAll('.copyTxtBtn');
        copyBtns.forEach(function(copyEachBtns) {
            copyEachBtns.addEventListener('click', function(e) {
                var copiedText = copyEachBtns.parentElement.firstElementChild;
                copiedText.select();
                copiedText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copiedText.value);
                copyEachBtns.closest('.entity-value-div').lastElementChild.classList.add('codeCopied');
                setTimeout(function() {
                    copyEachBtns.parentElement.lastElementChild.classList.remove(
                        'codeCopied');
                }, 3500);
            })
        })
    </script>

</body>

</html>
