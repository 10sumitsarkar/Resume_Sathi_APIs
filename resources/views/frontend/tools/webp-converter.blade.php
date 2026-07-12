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
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="ResumeSathi Logo">
    <title>WEBP Converter | ResumeSathi</title>
    <meta name="description" content="Convert your image pictures into the more efficient WebP format. WebP is supported by Chrome, Firefox, Edge and Safari">
    <meta name="keywords" content="online WEBP converter, convert to WEBP, WEBP image converter, convert image to WEBP, JPEG to WEBP, PNG to WEBP, WEBP file converter, free WEBP converter, WEBP format converter, convert images online, image to WEBP converter, online image converter, convert pictures to WEBP, fast WEBP converter, WEBP conversion tool">
    <link rel="canonical" href="https://www.ResumeSathi.com/webp-converter" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="WEBP Converter | ResumeSathi" />
    <meta property="og:description" content="Convert your image pictures into the more efficient WebP format. WebP is supported by Chrome, Firefox, Edge and Safari" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.ResumeSathi.com/webp-converter" />
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
            <h1 class="topics-heading text-start pb-3">Webp<span> Converter</span></h1>
            <p class="topics-heading-para">Convert your images to WEBP and compress image size online</p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <section class="document-upload-section webp-converter-upload pointer-cursor">
                        <label for="inputImage" id="output" class="webp-converter-output"></label>
                        <input type="file" id="inputImage" accept="image/*" hidden>
                        <label for="inputImage" class="selectPdfLabel">
                            <img src="{{asset('front-assets/images/tools-images/upload.svg')}}" alt="WebP Converter">
                            <span class="d-block text-center">Upload Image</span>
                        </label>
                    </section>
                    <div>
                        <div class="range-slider">
                            <div id="tooltip"></div>
                            <label for="quality" class="quality-label">Quality :</label>
                            <input type="range" id="quality" value="80" step="1" min="1" max="100" onchange="convertImage()">
                        </div>
                    </div>
                    <div class="filename-of-pdf"></div>
                    <div class="my-3 d-flex justify-content-center"><button class="btn tools-button" id="downloadBtn" onclick="downloadImage()">Download Now</button></div>


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
    <script>
        function downloadImage() {
                var downloadLink = document.createElement('a');
                downloadLink.setAttribute('download', 'converted_image.webp');
                downloadLink.setAttribute('href', document.getElementById('output').querySelector('img').src);
                downloadLink.click();
            }

            document.getElementById('inputImage').addEventListener('change', function () {
                var file = this.files[0];
                if (file) {
                    document.querySelector('.selectPdfLabel').style.opacity = "0.1"
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var image = new Image();
                        image.onload = function () {
                            var canvas = document.createElement('canvas');
                            var ctx = canvas.getContext('2d');
                            canvas.width = image.width;
                            canvas.height = image.height;
                            ctx.drawImage(image, 0, 0);

                            var quality = parseFloat(document.getElementById('quality').value);
                            var webpData = canvas.toDataURL('image/webp', quality);
                            var img = new Image();
                            img.src = webpData;

                            document.getElementById('output').innerHTML = '';
                            document.getElementById('output').appendChild(img);
                            document.getElementById('downloadBtn').style.display = 'block';
                        };
                        image.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            function convertImage() {
                var fileInput = document.getElementById('inputImage');
                var file = fileInput.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var image = new Image();
                        image.onload = function () {
                            var canvas = document.createElement('canvas');
                            var ctx = canvas.getContext('2d');
                            canvas.width = image.width;
                            canvas.height = image.height;
                            ctx.drawImage(image, 0, 0);
                            var quality = parseFloat(document.getElementById('quality').value);
                            var webpData = canvas.toDataURL('image/webp', quality);
                            var img = new Image();
                            img.src = webpData;
                            document.getElementById('output').innerHTML = '';
                            document.getElementById('output').appendChild(img);
                            document.getElementById('downloadBtn').style.display = 'block';
                        };
                        image.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }

            const range = document.getElementById('quality'),
                tooltip = document.getElementById('tooltip'),
                setValue = () => {
                    const newValue = Number((range.value - range.min) * 100 / (range.max - range.min)),
                        newPosition = 16 - (newValue * 0.32);
                    tooltip.innerHTML = `<span>${range.value}</span>`;
                    tooltip.style.left = `calc(${newValue}% + (${newPosition}px))`;
                    document.documentElement.style.setProperty("--range-progress", `calc(${newValue}% + (${newPosition}px))`);
                };
            document.addEventListener("DOMContentLoaded", setValue);
            range.addEventListener('input', setValue);
    </script>
</body>

</html>
