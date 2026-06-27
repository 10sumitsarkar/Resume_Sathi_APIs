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
    <title>CSS Minifier & Compressor | w3coderschool</title>
    <meta name="description"
        content="Use our CSS Minifier & Compressor tool to reduce CSS code size and make your website load faster. Get started for free now.">
    <meta name="keywords" content="CSS Minifier">
    <link rel="canonical" href="https://www.w3coderschool.com/css-minifier" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="CSS Minifier & Compressor | w3coderschool" />
    <meta property="og:description"
        content="Use our CSS Minifier & Compressor tool to reduce CSS code size and make your website load faster. Get started for free now." />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/css-minifier" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/tools-style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/tool-responsive.css') }}">

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

    <section class="pb-4  pt-3 pt-md-5">
        <div class="container-fluid common-container">
            <h1 class="topics-heading text-start pb-3">CSS MINIFIER <span>&</span> COMPRESSOR</h1>
            <p class="topics-heading-para">By minifying all the unneeded code it reduces the file size of your CSS scripts</p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="text-transform-output-area">
                        <textarea id="input" placeholder="Enter your CSS code here"></textarea>
                    </div>
                    <div class="mt-3 text-transforms-buttons">
                        <button class="btn clear-all-btn" id="clear">Clear All</button>
                        <button class="btn" id="minifyBtn">Minify CSS</button>
                    </div>
                    <div class="text-transform-output-area mt-3">
                        <textarea id="output" placeholder="Minified CSS will appear here" readonly></textarea>
                        <img src="{{ asset('front-assets/images/icons/copy-text.svg') }}" alt="Copy" width="32"
                            title="Copy" class="transformCopyTxtBtn" id="copyToClipboard">
                    </div>
                    <div class="pincode-tool-details-div">
                        {{-- Content Here.. --}}
                    </div>

                </div>
                <div class="col-lg-4 col-xl-3">
                    <!-- Google search Start -->
                    <div class="right_search_input">
                        @include('frontend.layout.inc.sidebar-components.search-adsense')
                    </div>
                    <!-- Google search End -->
                
                    {{-- Others Tools  Start --}}
                    @include('frontend.layout.inc.sidebar-components.tools-categories')
                    {{-- Other Tools End --}}
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layout.inc.footer')

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>


    <script>
        // All count js start

        const textArea = document.getElementById('output');
        // Copy text
        document.getElementById('copyToClipboard').addEventListener('click', function() {
            var text = document.getElementById('output');
            text.select();
            document.execCommand('copy');
        })
        document.addEventListener("DOMContentLoaded", function() {
            const inputTextarea = document.getElementById("input");
            const outputTextarea = document.getElementById("output");
            const minifyBtn = document.getElementById("minifyBtn");
            const clear = document.getElementById("clear");

            minifyBtn.addEventListener("click", function() {
                const cssCode = inputTextarea.value;
                const minifiedCss = minifyCSS(cssCode);
                outputTextarea.value = minifiedCss;
            });

            function minifyCSS(css) {
                // Implement your CSS minification logic here
                // For a basic example, you can remove comments and whitespace
                return css.replace(/\/\*[\s\S]*?\*\/|\/\/.*/g, "").replace(/\s+/g, " ").trim();
            };

            clear.addEventListener("click", function() {
                inputTextarea.value = '';
                outputTextarea.value = '';
            });
        });
    </script>
</body>

</html>
