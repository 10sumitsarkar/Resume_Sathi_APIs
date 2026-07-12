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
    <title>Convert Case | ResumeSathi</title>
    <meta name="description" content="Easily convert text between different letter cases: lower case, UPPER CASE, Sentence case, Capitalized Case, aLtErNaTiNg cAsE and more online.">
    <meta name="keywords" content="convert case, case converter, text case changer, change case online, uppercase to lowercase, lowercase to uppercase, title case converter, sentence case converter, online case converter, convert text case, change text case, free case converter, upper case to lower case, capitalize text, case conversion tool">
    <link rel="canonical" href="https://www.ResumeSathi.com/case-converter" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Convert Case | ResumeSathi" />
    <meta property="og:description" content="Easily convert text between different letter cases: lower case, UPPER CASE, Sentence case, Capitalized Case, aLtErNaTiNg cAsE and more online." />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.ResumeSathi.com/case-converter" />
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
            <h1 class="topics-heading text-start pb-3">Convert  <span> Case</span></h1>
            <p class="topics-heading-para">Convert upper case to lower case, lower case to upper case and more!</p>
            <div class="row mt-5 pt-3">

                <div class="col-lg-8 col-xl-9">
                    <div class="text-transform-output-area">
                        <div class="text-count-div">
                            <p>Word: <span id="word-count">0</span></p>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <p>Character: <span id="char-count">0</span></p> &nbsp;&nbsp;|&nbsp;&nbsp;
                            <p>Line: <span id="line-count">0</span></p>
                        </div>
                        <textarea id="text" placeholder="Type or paste your text here to convert case"></textarea>
                        <img src="{{ asset('front-assets/images/icons/copy-text.svg') }}" alt="Copy" width="32"
                            title="Copy" class="transformCopyTxtBtn" id="copyToClipboard">
                    </div>
                    <div class="my-3 text-transforms-buttons">
                        <button class="btn" onclick="applyTransform('sentencecase')">Sentence case</button>
                        <button class="btn" onclick="applyTransform('lowercase')">lower case</button>
                        <button class="btn" onclick="applyTransform('uppercase')">UPPERCASE</button>
                        <button class="btn" onclick="applyTransform('capitalize')">Capitalized Case</button>
                        <button class="btn" onclick="applyTransform('titlecase')">Title Case</button>
                        <button class="btn" onclick="applyTransform('reversetext')">Reverse Text</button>
                    </div>
                    <div class="pincode-tool-details-div">
                        {{-- Content Here... --}}
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
        function applyTransform(transform) {
            var text = document.getElementById("text").value;
            var textes = document.getElementById("text");
            var result = document.getElementById("result");

            switch (transform) {
                case "uppercase":
                    textes.value = text.toUpperCase();
                    break;
                case "lowercase":
                    textes.value = text.toLowerCase();
                    break;
                case "capitalize":
                    textes.value = text.toLowerCase().replace(/\b\w/g, function(a) {
                        return a.toUpperCase()
                    });
                    break;
                case "titlecase":
                    var words = text.toLowerCase().split(" ");
                    for (var i = 0; i < words.length; i++) {
                        words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
                    }
                    textes.value = words.join(" ");
                    break;
                case "sentencecase":
                    textes.value = text.toLowerCase().replace(/(^|\. *)([a-z])/g, function(match, separator, char) {
                        return separator + char.toUpperCase();
                    });
                    break;
                case "reversetext":
                    textes.value = text.split("").reverse().join("");
                    break;
                default:
                    textes.value = text;
            }
        }
        // All count js start
        const textArea = document.getElementById('text');
        const wordCount = document.getElementById('word-count');
        const charCount = document.getElementById('char-count');
        const lineCount = document.getElementById('line-count');

        textArea.addEventListener('input', function() {
            let text = textArea.value;

            // Count the number of words
            let words = text.match(/\S+/g);
            wordCount.innerText = words ? words.length : 0;

            // Count the number of characters
            charCount.innerText = text.length;

            // Count the number of lines
            let lines = text.split(/\r?\n/);
            lineCount.innerText = lines.length;
        });

        // Copy text
        document.getElementById('copyToClipboard').addEventListener('click', function() {

            var text = document.getElementById('text');
            text.select();
            document.execCommand('copy');

        })
    </script>
</body>

</html>
