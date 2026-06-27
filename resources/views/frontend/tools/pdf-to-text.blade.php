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
    <title>Pdf To Text Converter | w3coderschool</title>
    <meta name="description"
        content="PDF documents have become a standard format for sharing information in a digital form">
    <meta name="keywords" content="Pdf To Text Converter">
    <link rel="canonical" href="https://www.w3coderschool.com/pdf-to-text" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="Pdf To Text Converter" />
    <meta property="og:description"
        content="PDF documents have become a standard format for sharing information in a digital form" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="https://www.w3coderschool.com/pdf-to-text" />
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
            <h1 class="topics-heading text-start pb-3">PDF to Text <span>Converter</span></h1>
            <p class="topics-heading-para">Convert your pdf to text</p>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <section class="document-upload-section pointer-cursor">
                        <input type="file" id="pdf-file" accept=".pdf" hidden>
                        <label for="pdf-file" class="selectPdfLabel">
                            <img src="{{ asset('front-assets/images/tools-images/upload.svg') }}"
                                alt="PDF to Text Converter">
                            <span class="d-block text-center">Upload PDF File</span>
                        </label>
                    </section>
                    <div class="filename-of-pdf"></div>
                    <div class="my-3 d-flex justify-content-center"><button class="btn tools-button"
                            id="convert-btn">Convert to
                            Text</button></div>
                    <div class="pdf-to-text-output-area">
                        <textarea id="text-output" placeholder="Your text will generate here..."></textarea>
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
        const pdfFileInput = document.getElementById('pdf-file');
        const convertBtn = document.getElementById('convert-btn');
        const textOutput = document.getElementById('text-output');
        const fileNameOutput = document.querySelector('.filename-of-pdf')
        pdfFileInput.onchange = function() {
            const fileName = this.value;
            fileNameOutput.innerHTML = fileName
            if (fileName !== null) {
                fileNameOutput.style.display = 'block';
            }
        };

        convertBtn.addEventListener('click', async () => {
            const file = pdfFileInput.files[0];
            const reader = new FileReader();
            reader.readAsArrayBuffer(file);

            reader.onload = async () => {
                const pdf = await pdfjsLib.getDocument({
                    data: new Uint8Array(reader.result)
                }).promise;
                const maxPages = pdf.numPages;
                let text = '';

                for (let i = 1; i <= maxPages; i++) {
                    const page = await pdf.getPage(i);
                    const content = await page.getTextContent();
                    const pageText = content.items.map(item => item.str).join('\n');
                    text += pageText + '\n\n';
                }
                textOutput.value = text;
                var textValue = textOutput.value;
                var withOutSpace = textValue.replace(/\s+/g, '').length;
                if (withOutSpace === 0) {
                    textOutput.value = 'Sorry! Unable to convert this PDF file...'
                    textOutput.style.color = '#EB3B5A'
                    textOutput.style.fontSize = '16px'
                } else {
                    textOutput.style.color = '#333'
                }

            };
        });
    </script>
</body>

</html>
