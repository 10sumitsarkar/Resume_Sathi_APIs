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
    <title>Animation.css Preview | ResumeSathi</title>
    <meta name="description" content="Effortlessly test, customize, and visualize CSS animations in real time for seamless web development.">
    <meta name="keywords" content="CSS animations, Animation.css, CSS effects, web animations, animate CSS, preview animations, custom CSS animations, front-end development, web design, animation preview tool">
    <link rel="canonical" href="https://www.ResumeSathi.com/case-converter" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Animation.css Preview | ResumeSathi" />
    <meta property="og:description" content="Effortlessly test, customize, and visualize CSS animations in real time for seamless web development." />
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

    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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
            <h1 class="topics-heading text-start pb-3">Animation.css  <span> Preview</span></h1>
            <p class="topics-heading-para">Convert upper case to lower case, lower case to upper case and more!</p>
            <div class="row mt-5 pt-3">

                <div class="col-lg-8 col-xl-9">
                    <div class="animate-preview-output-area">
                        <div class="text-select-divs">
                            <select id="animationCategory" onchange="updateAnimationOptions()">
                                <option value="attentionSeekers">Attention Seekers</option>
                                <option value="fadingEntrances">Fading Entrances</option>
                                <option value="flippers">Flippers</option>
                                <option value="lightspeed">LightSpeed</option>
                                <option value="rotatingEntrances">Rotating Entrances</option>
                                <option value="zoomEntrances">Zoom Entrances</option>
                            </select>
                            <select id="animationSelect" onchange="applyAnimation()"></select>
                        </div>
                        <div id="animatedText">
                            ResumeSathi
                        </div>
                    </div>
                    <p class="animate-code-para">Add the following link inside the <b>&lt;head&gt;</b> tag of your HTML file.</p>
                    <div class="animation-preview-code-box">
                         <code id="cssCode">&lt;link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"&gt;</code>
                        <div class="copy-div">
                            <img src="{{ asset('front-assets/images/icons/copy-text.svg') }}" alt="Copy" width="32"
                        title="Copy" class="animate-preview-copy-btn" onclick="copyCode('cssCode')">
                        <div class="copy-noty-div">
                            Copied
                        </div>
                        </div>
                    </div>
                    <p class="animate-code-para">Add the class <b>animate__infinite</b> for an infinite loop</p>
                    <div class="animation-preview-code-box">
                        <code id="htmlCode">&lt;h1 class="animated bounce"&gt;Example Text&lt;/h1&gt;</code>
                        <div class="copy-div">
                            <img src="{{ asset('front-assets/images/icons/copy-text.svg') }}" alt="Copy" width="32"
                        title="Copy" class="animate-preview-copy-btn" onclick="copyCode('htmlCode')">
                        <div class="copy-noty-div">
                            Copied
                        </div>
                        </div>
                    </div>
                    <div class="pincode-tool-details-div">
                      <p>Easily apply stunning animations to your elements using Animate.css! Simply add the appropriate classes to your HTML elements and see the effects in action.</p>
                      <h2>Core Classes (Required for Animations)</h2>
                      <ul>
                        <li><b>animate__animated →</b> Always required to apply animations.</li>
                        <li><b>animate__infinite →</b> Loops the animation infinitely.</li>
                        <li><b>animate__repeat-1, animate__repeat-2, animate__repeat-3 →</b> Controls the number of animation repeats.</li>
                        <li><b>animate__delay-1s, animate__delay-2s, animate__delay-3s →</b> Adds a delay before the animation starts.</li>
                        <li><b>animate__faster, animate__fast, animate__slow, animate__slower →</b> Controls the animation speed.</li>
                      </ul>
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
        const animations = {
            attentionSeekers: ["bounce", "flash", "pulse", "rubberBand", "shakeX", "shakeY", "headShake", "swing", "tada", "wobble", "jello", "heartBeat"],
            fadingEntrances: ["fadeIn", "fadeInDown", "fadeInLeft", "fadeInRight", "fadeInUp"],
            flippers: ["flip", "flipInX", "flipInY"],
            lightspeed: ["lightSpeedInRight", "lightSpeedInLeft"],
            rotatingEntrances: ["rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight"],
            zoomEntrances: ["zoomIn", "zoomInDown", "zoomInLeft", "zoomInRight", "zoomInUp"]
        };

        function updateAnimationOptions() {
            let category = document.getElementById("animationCategory").value;
            let animationSelect = document.getElementById("animationSelect");
            animationSelect.innerHTML = "";
            animations[category].forEach(animation => {
                let option = document.createElement("option");
                option.value = animation;
                option.textContent = animation;
                animationSelect.appendChild(option);
            });
            applyAnimation();
        }

        function applyAnimation() {
            let animation = document.getElementById("animationSelect").value;
            let textElement = document.getElementById("animatedText");
            textElement.className = `animate__animated animate__${animation} animate__infinite`;
            document.getElementById("htmlCode").innerText = `<h1 class="animate__animated animate__${animation}">Example Text</h1>`;
        }

        function copyCode(elementId) {
            let text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                document.getElementById(elementId).closest('.animation-preview-code-box').querySelector('.copy-noty-div').classList.add('codeCopied');
                setTimeout(function() {
                    document.getElementById(elementId).closest('.animation-preview-code-box').querySelector('.copy-noty-div').classList.remove(
                        'codeCopied');
                }, 3500);
            });
        }

        document.addEventListener("DOMContentLoaded", updateAnimationOptions);
    </script>
</body>

</html>
