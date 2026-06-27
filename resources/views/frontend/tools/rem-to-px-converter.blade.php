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
    <title>REM to PX Converter | w3coderschool</title>
    <meta name="description"
        content="Effortlessly convert REM values to Pixel units with our user-friendly REM to Pixel Converter tool. Enter the REM value, click 'Convert,' and instantly get the equivalent Pixel value based on a root font size of 16px. Simple, accurate, and convenient for responsive web design. Try it now!">
    <meta name="keywords" content="REM to PX converter, convert REM to pixels, online REM to PX converter, REM to pixel conversion, PX to REM converter, CSS REM to PX, convert REM units, REM PX converter tool, REM to pixel calculator, free REM to PX converter, convert CSS units, REM to PX online tool, web design REM to PX">
    <link rel="canonical" href="https://www.w3coderschool.com/rem-to-px-converter" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="REM to PX Converter | w3coderschool" />
    <meta property="og:description"
        content="Effortlessly convert REM values to Pixel units with our user-friendly REM to Pixel Converter tool. Enter the REM value, click 'Convert,' and instantly get the equivalent Pixel value based on a root font size of 16px. Simple, accurate, and convenient for responsive web design. Try it now!" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/rem-to-px-converter" />
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
            <h1 class="topics-heading text-start pb-3">REM to PX<span> Converter</span></h1>
            <p class="topics-heading-para">This tool simplifies the process of converting REM values to Pixel units, making it easy for responsive web design</p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="px-rem-em-converter">
                        <label for="remInput">
                            REM
                            <div>
                                <input type="number" id="remInput" placeholder="Enter rem value"
                                    oninput="convertRemToPixels()" value="1" min="1">
                                <span>rem</span>
                            </div>
                        </label>
                        <a href="{{ url('px-to-rem-converter') }}">
                            &#8644;
                        </a>
                        <label for="pxInput">
                            Pixel
                            <div>
                                <input type="number" id="pxInput" placeholder="Enter pixel value"
                                    oninput="convertPixelsToRem()" value="16" min="1">
                                <span>px</span>
                            </div>
                        </label>

                    </div>
                    <div class="default-font-setup-div">
                        <p>This calculation is based on an adjustable default root font-size of 16 pixels.</p>
                        <div class="custom-input">
                            <label for="root-font" class="edit-pen">&#9998;</label>
                            <div class="base-div">Base</div>
                            <div class="input-div"><input type="number" id="root-font" oninput="fontRoot()"
                                    class="input-tag" value="16" min="1"></div>
                        </div>
                    </div>
                    <div class="pincode-tool-details-div">
                          {{-- Content here --}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <script>
        function convertPixelsToRem() {
            var pixelValue = document.getElementById("pxInput").value;

            // Assuming root font size is 16px, adjust this value if your root font size is different
            var rootFontSize = document.getElementById('root-font').value;

            var remValue = pixelValue / rootFontSize;

            document.getElementById("remInput").value = remValue;
        }
        function convertRemToPixels() {
            var remValue = document.getElementById("remInput").value;

            // Assuming root font size is 16px, adjust this value if your root font size is different
            var rootFontSize = document.getElementById('root-font').value;

            var pxValue = remValue * rootFontSize;

            document.getElementById("pxInput").value = pxValue;
        }
        function fontRoot() {
            var pixelValue = document.getElementById("pxInput").value;
            // Assuming root font size is 16px, adjust this value if your root font size is different
            var rootFontSize = document.getElementById('root-font').value;
            var remValue = pixelValue / rootFontSize;
            document.getElementById("remInput").value = remValue;
        }
    </script>
</body>

</html>
