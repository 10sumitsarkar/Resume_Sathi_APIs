<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="ResumeSathi Logo">
    <title>Code Playground | ResumeSathi</title>
    <meta name="description" content="Test your JavaScript, CSS, HTML or CoffeeScript online">
    <meta name="keywords" content="Code Playground, ResumeSathi, Learn Coding Online, Online Code Editor, Web Development Playground, HTML CSS JavaScript Practice, Online Programming Platform, Code Learning Tools, Try Coding Online, Interactive Coding Lessons, Frontend Code Practice, Web Developer Sandbox, Online Coding Tutorials, Test Code Online, Programming Playground, Free Code Editor, Online Coding Exercises, Real-time Code Compiler, JavaScript Code Editor Online, Beginner Coding Lessons">
    <link rel="canonical" href="https://www.ResumeSathi.com/coding-play-ground" />

    <!-- Preloded CSS start -->
    <link rel="preload" as="style" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="preload" as="style" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="preload" as="style" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700;800;900&display=swap">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Noto+Sans:wght@400;500;600;700;800;900&display=swap">

    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.css">
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/theme/dracula.min.css">
    <!-- Preloded CSS end-->

    <!-- Regular CSS Start -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Noto+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/theme/dracula.min.css">
    <!-- Regular CSS End -->

    <!-- CodeMirror JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.0/mode/javascript/javascript.min.js"></script>

    <!--- OG meta tags start -->
    <meta property="og:title" content="Code Playground | ResumeSathi" />
    <meta property="og:description" content="Test your JavaScript, CSS, HTML or CoffeeScript online" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <!--- OG meta tags end -->

    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}

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

<body style="background-color: #282c34;">

    <div class="play-ground-mob-tab">
        <div>
            <img loading="lazy" src="{{ asset('front-assets/images/icons/playground-html.svg')}}" width="16" height="16"
                alt="HTML Code">
            HTML
        </div>
        <div>
            <img loading="lazy" src="{{ asset('front-assets/images/icons/playground-css.svg')}}" width="16" height="16"
                alt="CSS Code">
            CSS
        </div>
        <div>
            <img loading="lazy" src="{{ asset('front-assets/images/icons/playground-js.svg')}}" width="16" height="16" alt="JS Code">
            JS
        </div>
        <div>
            Result
        </div>
    </div>
    <div class="code-playground" id="playground">
        <div class="editors d-none d-lg-block">
            <div class="editor-pane mob-tab" id="html-pane">
                <div class="editor-header">
                    <img loading="lazy" src="{{ asset('front-assets/images/icons/playground-html.svg') }}" width="16"
                        height="16" alt="HTML Code">
                    HTML
                </div>
                <textarea class="editor-content" id="html-content"><p>Welcome to <span>ResumeSathi</span></p></textarea>
            </div>

            <div class="editor-pane mob-tab" id="css-pane">
                <div class="editor-header">
                    <img loading="lazy" src="{{ asset('front-assets/images/icons/playground-css.svg') }}" width="16"
                        height="16" alt="HTML Code">
                    CSS
                </div>
                <textarea class="editor-content" id="css-content">p {
color:#333;
text-align:center;
font-size:28px;
margin-top:35px;
}

span {
    color:green;
    font-weight:bold;
}</textarea>
            </div>

            <div class="editor-pane mob-tab" id="js-pane">
                <div class="editor-header">
                    <img loading="lazy" src="{{ asset('front-assets/images/icons/playground-js.svg') }}" width="16" height="16"
                        alt="JS Code">
                    JS
                </div>
                <textarea class="editor-content" id="js-content">Js here..</textarea>
            </div>
        </div>

        <div class="output mob-tab" id="output">
            <h1 class="editor-header output-title">Result</h1>
            <iframe id="output-frame"></iframe>
        </div>
    </div>

    <script src="https://unpkg.com/split.js/dist/split.min.js"></script>
    <script>
        // Initialize Split.js for horizontal resizing between editors and output
        Split(['.editors', '.output'], {
            sizes: [25, 75], // Initial sizes: 60% for editors, 40% for output
            minSize: [300, 200], // Minimum sizes in pixels
            gutterSize: 20, // Width of the gutter (draggable area)
            cursor: 'col-resize' // The cursor when hovering over the gutter
        });

        // Initialize Split.js for vertical resizing between HTML, CSS, JS sections
        Split(['#html-pane', '#css-pane', '#js-pane'], {
            sizes: [33.33, 33.33, 33.33], // Equal sizes for each panel initially
            minSize: 100, // Minimum size of each panel
            gutterSize: 15, // Width of the gutter (draggable area)
            direction: 'vertical', // Resize direction
            cursor: 'row-resize' // Cursor type for vertical resizing
        });

        // Initialize CodeMirror for each textarea
        const htmlEditor = CodeMirror.fromTextArea(document.getElementById('html-content'), {
            mode: 'text/html',
            theme: 'dracula',
            lineNumbers: true,
            lineWrapping: true
        });

        const cssEditor = CodeMirror.fromTextArea(document.getElementById('css-content'), {
            mode: 'text/css',
            theme: 'dracula',
            lineNumbers: true,
            lineWrapping: true
        });

        const jsEditor = CodeMirror.fromTextArea(document.getElementById('js-content'), {
            mode: 'text/javascript',
            theme: 'dracula',
            lineNumbers: true,
            lineWrapping: true
        });

        // Update output frame when content changes
        const outputFrame = document.getElementById('output-frame');

        function updateOutput() {
            const outputDoc = outputFrame.contentDocument || outputFrame.contentWindow.document;
            outputDoc.open();
            outputDoc.write(htmlEditor.getValue() + '<style>' + cssEditor.getValue() + '</style>' + '<script>' + jsEditor
                .getValue() + '<\/script>');
            outputDoc.close();
        }

        // Add event listeners for CodeMirror changes
        htmlEditor.on('change', updateOutput);
        cssEditor.on('change', updateOutput);
        jsEditor.on('change', updateOutput);
        // Run the function when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateOutput(); // Execute the updateOutput function on page load
        });


        // Change tab for small screen
        // Change tab for small screen
        // Select all divs inside .play-ground-mob-tab
        var mobTab = document.querySelectorAll('.play-ground-mob-tab div');

        // Select all .mob-tab elements inside .code-playground
        var mobBox = document.querySelectorAll('.code-playground .mob-tab');

        // Loop through each tab and add a click event listener
        mobTab.forEach((eachMobtab, tabIndex) => {
            eachMobtab.addEventListener('click', (e) => {
                // Remove 'active' class from all tabs
                mobTab.forEach(tab => tab.classList.remove('active'));
                // Hide all mobBox elements first
                mobBox.forEach(box => box.classList.add('d-none'));
                // Add 'active' class to the clicked tab
                eachMobtab.classList.add('active');
                // Show the clicked tab's corresponding box
                mobBox[tabIndex].classList.remove('d-none');

                // Show or hide the .editors section based on tab index
                if (tabIndex !== 3) {
                    document.querySelector('.editors').classList.remove('d-none');
                } else {
                    document.querySelector('.editors').classList.add('d-none');
                }

                // Refresh CodeMirror editors when switching tabs
                setTimeout(() => {
                    htmlEditor.refresh();
                    cssEditor.refresh();
                    jsEditor.refresh();
                }, 100); // Small delay to ensure the element is visible before refreshing

            });
        });
    </script>
</body>

</html>
