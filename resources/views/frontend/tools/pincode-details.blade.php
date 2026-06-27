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
    <title>Search By Pincode | w3coderschool</title>
    <meta name="description"
        content="Using the pincode tool for area details is very simple. Follow the steps given below to use the pincode tool for area details:">
    <meta name="keywords" content="search by pincode, pincode finder, postal code search, find pincode, pincode lookup, zip code search, pincode locator, area pincode search, find postal code, pincode search tool, search by postal code, local pincode finder, search by zip code, pincode checker, postal code lookup">
    <link rel="canonical" href="https://www.w3coderschool.com/pincode-details" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Search By Pincode | w3coderschool" />
    <meta property="og:description"
        content="Using the pincode tool for area details is very simple. Follow the steps given below to use the pincode tool for area details:" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/pincode-details" />
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
            <h1 class="topics-heading text-start pb-3">Search <span>By PinCode</span></h1>
            <p class="topics-heading-para">Get Pincode details of all regions. Find here the Post office location, full address and its pincode. </p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <section class="document-upload-section pincode-detail-input-div">
                        <label for="pdf-file" class="w-100">
                            <img src="{{ asset('front-assets/images/tools-images/view-location.svg') }}"
                                alt="Pincode Details" width="100" class="d-block mx-auto">
                            <input type="text" id="pin-code-input" placeholder="Type Pincode here">
                        </label>
                    </section>
                    <div class="my-3 d-flex justify-content-center"><button class="btn tools-button"
                            onclick="getPinCodeDetailsNow()">Search Details</button></div>
                    <div id="pincode-details-output">

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
    <script>
        function getPinCodeDetailsNow() {
            var pinCodeInput = document.getElementById("pin-code-input");
            var result = document.getElementById("pincode-details-output");

            // Check if a pin code was entered
            if (!pinCodeInput.value) {
                result.innerHTML = "<p class='invalid-error'>Please enter a pin code</p>";
                return;
            }

            // Make a GET request to the Post Office Pin Code API
            var pinCode = pinCodeInput.value;
            var url = "https://api.postalpincode.in/pincode/" + pinCode;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Check if the API returned any data
                    if (data[0].Status === "Error") {
                        result.innerHTML = "<p class='invalid-error'>Invalid pin code</p>";
                        return;
                    }

                    // Display the pin code details
                    var details2 = data[0].PostOffice;
                    var html = "<div class='row mt-4'>";
                    html += "<h2 class='mt-4 showing-pincode-details-head'> Details showing for pincode " + details2[0]
                        .Pincode + "</h2>";
                    for (var i = 0; i < details2.length; i++) {
                        html += "<div class='col-md-6 mt-3'>"
                        html += "<div class='pincode-details-output-area'>";
                        html += "<div class='pincode-numbering-system'>" + [i + 1] + "</div>";
                        html += "<p>" + '<span>Post Office : </span>' + details2[i].Name + "</p>";
                        html += "<p>" + '<span>BranchType : </span>' + details2[i].BranchType + "</p>";
                        html += "<p>" + '<span>Post Office Status : </span>' + details2[i].DeliveryStatus + "</p>";
                        html += "<p>" + '<span>Block : </span>' + details2[i].Block + "</p>";
                        html += "<p>" + '<span>Division : </span>' + details2[i].Division + "</p>";
                        html += "<p>" + '<span>District : </span>' + details2[i].District + "</p>";
                        html += "<p>" + '<span>Region : </span>' + details2[i].Region + "</p>";
                        html += "<p>" + '<span>Circle : </span>' + details2[i].Circle + "</p>";
                        html += "<p>" + '<span>State : </span>' + details2[i].State + "</p>";
                        html += "<p>" + '<span>Country : </span>' + details2[i].Country + "</p>";
                        html += "<p>" + '<span>Pincode : </span>' + details2[i].Pincode + "</p>";
                        html += "</div>";
                        html += "</div>";
                    }
                    html += "</div>";
                    result.innerHTML = html;
                })
                .catch(error => {
                    result.innerHTML = "<p class='invalid-error'>Error retrieving pin code details</p>";
                });
        }
    </script>
</body>

</html>
