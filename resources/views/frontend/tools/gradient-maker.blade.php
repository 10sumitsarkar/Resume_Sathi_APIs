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
    <title>Free Gradient Generator | w3coderschool</title>
    <meta name="description"
        content="Free tool to easily make and generate cross browser linear or radial css gradients. You can generate your custom css gradient in HEX or RGBA color format.">
    <meta name="keywords" content="Random Gradient Generator">
    <link rel="canonical" href="https://www.w3coderschool.com/css-minifier" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Free Gradient Generator | w3coderschool" />
    <meta property="og:description"
        content="Free tool to easily make and generate cross browser linear or radial css gradients. You can generate your custom css gradient in HEX or RGBA color format." />
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
            <h1 class="topics-heading text-start pb-3">Gradient <span> Generator</span></h1>
            <p class="topics-heading-para">You can generate your custom css gradient in HEX or RGBA color format.</p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="gradient-main-box" id="gradientBox">
                        <button class="copy-btn transformCopyTxtBtn" id="copyToClipboard" title="Copy Gradient Color">
                            <img src="{{ asset('front-assets/images/icons/copy-text.svg') }}" alt="Copy"
                                width="24" height="24">
                        </button>
                    </div>
                    <div class="mt-3 generated-gradient-code" id="gradientCode">Wait...</div>
                    <div class="generate-gradient-buttons-div mt-3">
                        <label for="colorCount">Number of Color</label>
                        <input type="number" id="colorCount" min="2" max="5" value="2">
                        <div id="colorStopsContainer">
                            <!-- Dynamic color stops will be added here -->
                        </div>
                        <button onclick="generateRandomGradient()" id="generateBtn">Random Gradient</button>
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

    <script>
        // onload cliked on Generate button
        window.onload = function() {
            document.getElementById('generateBtn').click();
        }
        function generateRandomGradient() {
            const gradientBox = document.getElementById("gradientBox");
            const gradientCode = document.getElementById("gradientCode");
            const colorCount = parseInt(document.getElementById("colorCount").value);
            const colorStopsContainer = document.getElementById("colorStopsContainer");
            const positionInputDiv = document.createElement("div");
            positionInputDiv.classList.add("color-stop-slider-div");

            if (colorCount < 2) {
                alert("Number of color stops should be at least 2.");
                return;
            }
            if (colorCount > 5) {
                alert("Number of color stops should be less than 5.");
                return;
            }
            // Clear previous color stops
            colorStopsContainer.innerHTML = '';
            // Create and append color stops
            for (let i = 1; i <= colorCount; i++) {
                const label = document.createElement("label");
                label.classList = "total-color-label";
                label.textContent = `Color ${i}:`;
                const positionInputDiv = document.createElement("div");
                const percentLabelSpan = document.createElement("span");
                const positionInput = document.createElement("input");
                positionInput.type = "range";
                positionInput.classList = "range-slider__range";
                positionInput.min = "0";
                positionInput.max = "1";
                positionInput.step = "0.01";
                positionInput.value = (i - 1) / (colorCount - 1); // Default position
                positionInput.setAttribute("data-default-value", positionInput.value);
                positionInputDiv.appendChild(positionInput)
                positionInputDiv.classList = "color-stop-slider-div";
                positionInputDiv.appendChild(percentLabelSpan)
                const colorInput = document.createElement("input");
                colorInput.type = "color";
                colorInput.classList.add("custom-color-input");
                colorInput.value = getRandomColor();
                positionInput.style.background = colorInput.value;
                const colorStopContainer = document.createElement("div");
                colorStopContainer.classList.add("color-stop-container");


                // Event listener to update position display when range slider is moved
                positionInput.addEventListener("input", function() {
                    const percentage = Math.floor(positionInput.value * 100);
                    const colorValue = colorInput.value
                    const bg =
                        `linear-gradient(90deg, ${colorValue} ${percentage}%, rgb(215, 220, 223) ${percentage+0.1}%)`;
                    positionInput.style.background = bg;
                    percentLabelSpan.innerText = percentage + '%';
                    percentLabelSpan.style.left = percentage + '%';
                    percentLabelSpan.style.display = 'block';
                    updateGradient();
                });

                // Event listener to update gradient when custom color is changed
                colorInput.addEventListener("input", function() {
                    const percentage = positionInput.value * 100;
                    const colorValue = colorInput.value
                    const bg =
                        `linear-gradient(90deg, ${colorValue} ${percentage}%, rgb(215, 220, 223) ${percentage+0.1}%)`;
                    positionInput.style.background = bg;
                    updateGradient();
                });

                colorStopContainer.appendChild(label);
                colorStopsContainer.appendChild(colorStopContainer);
                colorStopContainer.appendChild(positionInputDiv);
                colorStopContainer.appendChild(colorInput);
                positionInputDiv.appendChild(positionInput);


                const percentage = positionInput.value * 100;
                const colorValue = colorInput.value
                const bg = `linear-gradient(90deg, ${colorValue} ${percentage}%, rgb(215, 220, 223) ${percentage+0.1}%)`;
                positionInput.style.background = bg;
            }

            // Reset range sliders to default positions
            resetRangeSliders();

            // Initial gradient rendering
            updateGradient();
        }

        function updateGradient() {
            const gradientBox = document.getElementById("gradientBox");
            const gradientCode = document.getElementById("gradientCode");
            const colorStopsContainer = document.getElementById("colorStopsContainer");

            const colorStops = Array.from(colorStopsContainer.getElementsByClassName("color-stop-container"));

            const gradient = colorStops.map(stop => {
                const position = stop.querySelector("input[type=range]").value;
                const color = stop.querySelector("input[type=color]").value;
                return `${color} ${position * 100}%`;
            });

            // Apply gradient to the box
            gradientBox.style.background = `linear-gradient(to right, ${gradient.join(', ')})`;

            // Display the generated gradient code
            const generatedCode = `linear-gradient(to right, ${gradient.join(', ')})`;
            gradientCode.textContent = `background: ${generatedCode}`;

        }

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function resetRangeSliders() {
            const rangeSliders = document.querySelectorAll("input[type=range]");
            rangeSliders.forEach(slider => {
                slider.value = parseFloat(slider.getAttribute("data-default-value"));
            });
        }

        // Initial setup for range sliders and custom color inputs
        window.addEventListener("DOMContentLoaded", () => {
            const rangeSliders = document.querySelectorAll("input[type=range]");
            rangeSliders.forEach(slider => {
                slider.setAttribute("data-default-value", slider.value);
            });

            const colorInputs = document.querySelectorAll(".custom-color-input");
            colorInputs.forEach(colorInput => {
                colorInput.addEventListener("input", function() {
                    updateGradient();
                });
            });
        });
        // Copy text
        document.getElementById('copyToClipboard').addEventListener('click', function(event) {
            navigator.clipboard.writeText(gradientCode.innerText);
            document.querySelector('#copyToClipboard img').src = "front-assets/images/icons/tick.svg";
            setTimeout(function() {
                document.querySelector('#copyToClipboard img').src =
                    "front-assets/images/icons/copy-text.svg";
            }, 1500);
        })
    </script>
</body>

</html>
