        <!-- Navbar start -->
        <nav class="navbar-main common-container">
            <a href="{{ url('/') }}" aria-label="Logo"><img src="{{ asset('front-assets/images/logos/logo.svg') }}"
                    width="110" height="56" alt="w3coderschool"></a>
            <div class="all-links-category">
                <ul class="nav-all-links">
                    <li class="link-list"><button aria-label="Tutorial">Tutorials</button>
                        <div class="nav-dropdown-menu">
                            <ul class="nav-dropdown-menu-inner">
                                @foreach (our_tutorials() as $item)
                                    <li><a href="{{ route('our-tutorials', $item->url_name) }}" aria-label="Tutorials">
                                            <img loading="lazy" src="{{ asset($item->image) }}"
                                                alt="{{ $item->title }}" title="{{ $item->title }}" width="20"
                                                height="20">
                                            {{ $item->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="link-list"><button aria-label="Snippets">Snippets</button>
                        <div class="nav-dropdown-menu">
                            <ul class="nav-dropdown-menu-inner">
                                @foreach (our_snipits() as $item)
                                    <li class="@if (in_array($item->title, ['HTML Course Code', 'CSS Course Code', 'JS Course Code'])) d-none @endif "><a
                                            href="{{ route('code-snipits', $item->url_name) }}"
                                            aria-label="Snippets"><img loading="lazy"
                                                src="{{ asset('front-assets/images/icons/open-close-tag.svg') }}"
                                                width="20" height="20" alt="Snippets" title="Snippets">
                                            {{ $item->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="link-list"><button aria-label="HTML Entity">HTML Entity</button>
                        <div class="nav-dropdown-menu">
                            <ul class="nav-dropdown-menu-inner">
                                @foreach (getHtmlSymbolCategories() as $item)
                                    <li><a href="{{ url($item->canonical_tag) }}">
                                            <span>{{ $item->symbol }}</span>
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="link-list"><button aria-label="Tools">Tools</button>
                        <div class="nav-dropdown-menu">
                            <ul class="nav-dropdown-menu-inner">
                                <li class="tool-category">Development</li>
                                <li><a href="{{ url('css-minifier') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/css-minifier.svg') }}"
                                            alt="" title="" width="20" height="20">
                                        CSS Minifier
                                    </a>
                                </li>
                                <li><a href="{{ url('gradient-maker') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/gradient-generator.svg') }}"
                                            alt="Gradient Generator" title="Gradient Generator" width="20"
                                            height="20">
                                        Gradient Generator
                                    </a>
                                </li>


                                <li><a href="{{ url('px-to-rem-converter') }}">
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/px-rem.svg') }}"
                                            alt="PX ⇄ REM Converter" title="PX ⇄ REM Converter" width="20"
                                            height="20">
                                        PX ⇄ REM Converter
                                    </a>
                                </li>
                                <li><a href="{{ url('px-to-em-converter') }}">
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/px-em.svg') }}"
                                            alt="PX ⇄ EM Converter" title="PX ⇄ EM Converter" width="20"
                                            height="20">
                                        PX ⇄ EM Converter
                                    </a>
                                </li>
                                <li><a href="{{ url('webp-converter') }}">
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/to-webp.svg') }}"
                                            alt="WEBP Converter" title="WEBP Converter" width="20" height="20">
                                        WEBP Converter
                                    </a>
                                </li>
                                <li><a href="{{ url('dev/animate-preview') }}">
                                        <img loading="lazy" src="{{ asset('front-assets/images/icons/to-webp.svg') }}"
                                            alt="WEBP Converter" title="WEBP Converter" width="20" height="20">
                                        Animation.css Preview
                                    </a>
                                </li>
                                <li class="tool-category">Converter</li>
                                <li><a href="{{ url('pdf-to-text') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/pdf-to-text-generator.svg') }}"
                                            alt="PDF to Text Converter" title="PDF to Text Converter" width="20"
                                            height="20">
                                        PDF to Text Converter
                                    </a>
                                </li>
                                <li><a href="{{ url('case-converter') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/pdf-to-text-generator.svg') }}"
                                            alt="Text Converter" title="Text Converter" width="20" height="20">
                                        Text Converter
                                    </a>
                                </li>
                                <li class="tool-category">Calculator</li>
                                <li><a href="{{ route('age-calculator') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/age-calculator.svg') }}"
                                            alt="Age Calculator" title="Age Calculator" width="20"
                                            height="20">
                                        Age Calculator
                                    </a>
                                </li>
                                <li class="tool-category">Utility</li>
                                <li><a href="{{ url('pincode-details') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/pincode-details.svg') }}"
                                            alt="Pincode Details Finder" title="Pincode Details Finder"
                                            width="20" height="20">
                                        Pincode Details Finder
                                    </a>
                                </li>
                                <li><a href="{{ url('white-board') }}">
                                        <img loading="lazy"
                                            src="{{ asset('front-assets/images/icons/white-board.svg') }}"
                                            alt="White Board" title="White Board" width="20" height="20">
                                        White Board
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="link-list"><a href="{{ url('free-resume-builder') }}"
                            aria-label="Create Resume">Create Resume</a>
                    </li>
                    {{-- <li class="link-list"><a href="{{ url('/') }}" aria-label="Home">Home</a>
                    </li>
                    <li class="link-list"><a href="{{route('about-us')}}" aria-label="About Us">About Us</a>
                    </li>
                    <li class="link-list"><a href="{{route('contact-us')}}" aria-label="Contact Us">Contact Us</a>
                    </li>
                    <li class="link-list"><a href="{{route('privacy-policy')}}" aria-label="Privacy Policy">Privacy Policy</a>
                    </li>
                    <li class="link-list"><a href="{{ route('disclaimer')}}" aria-label="Disclaimeer">Disclaimeer</a>
                    </li>       --}}
                </ul>
                <button class="category-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight"><img
                        src="{{ asset('front-assets/images/icons/category-bar.svg') }}" width="22"
                        height="14" alt="Category"></button>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Nav offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <div><img src="{{ asset('front-assets/images/logos/logo.svg') }}" width="100" height="41"
                        alt="Logo">
                </div>
                <button type="button" class="btn-close offcanvas-btn-close" data-bs-dismiss="offcanvasRight"
                    aria-label="Close"><img src="{{ asset('front-assets/images/icons/category-close-btn.svg') }}"
                        width="11" height="16" alt="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="main-nav container-fluid p-0">
                    <div class="row nav-category-boxes">
                        {{-- <div class="sub-nav col-6 mt-3">
                            <button class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-courses.svg') }}" width="36"
                                    height="36" alt="Our Courses">
                                Our Courses
                            </button>
                            <ul class="sub-content list-group" data-title="Our Courses">
                                <li class="sub-catecory-each-list">
                                    <ul>
                                        @foreach (our_courses() as $item)
                                            <li class="list-group-item"><a href="{{ route('course', $item->id) }}">
                                                    <img loading="lazy" src="{{ asset($item->course_image) }}"
                                                        alt="{{ $item->course_name }}"
                                                        title="{{ $item->course_name }}" width="20"
                                                        height="20"> {{ $item->course_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="sub-nav col-6 mt-3">
                            <button class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-tutorials.svg') }}" width="36"
                                    height="36" alt="Tutorials">
                                Tutorials
                            </button>
                            <ul class="sub-content list-group" data-title="Tutorials">
                                <li class="sub-catecory-each-list">
                                    <ul>
                                        @foreach (our_tutorials() as $item)
                                            <li class="list-group-item"><a
                                                    href="{{ route('our-tutorials', $item->url_name) }}"><img
                                                        loading="lazy" src="{{ asset($item->image) }}"
                                                        alt="{{ $item->title }}" title="{{ $item->title }}"
                                                        width="20" height="20">{{ $item->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-nav col-6 mt-3">
                            <button class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-code-snippets.svg') }}"
                                    width="36" height="36" alt="Snippets">
                                Snippets
                            </button>
                            <ul class="sub-content list-group" data-title="Snippets">
                                <li class="sub-catecory-each-list">
                                    <ul>
                                        @foreach (our_snipits() as $item)
                                            <li
                                                class="list-group-item @if (in_array($item->title, ['HTML Course Code', 'CSS Course Code', 'JS Course Code'])) d-none @endif ">
                                                <a href="{{ route('code-snipits', $item->url_name) }}"><img
                                                        loading="lazy"
                                                        src="{{ asset('front-assets/images/icons/open-close-tag.svg') }}"
                                                        width="20" height="20" alt="Snippets"
                                                        title="Snippets"> {{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-nav col-6 mt-3">
                            <button class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-html-entity.svg') }}"
                                    width="36" height="36" alt="HTML Entity">
                                HTML Entity
                            </button>
                            <ul class="sub-content list-group" data-title="HTML Entity">
                                <li class="sub-catecory-each-list">
                                    <ul>
                                        @foreach (getHtmlSymbolCategories() as $item)
                                            <li class="list-group-item"><a href="{{ url($item->canonical_tag) }}">
                                                    <span>{{ $item->symbol }}</span> {{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="sub-nav col-6 mt-3">
                            <button class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-tools.svg') }}" width="36"
                                    height="36" alt="Tools">
                                Tools
                            </button>
                            <ul class="sub-content list-group" data-title="Tools">
                                <li class="sub-catecory-each-list">
                                    <ul>
                                        <li class="tool-category">Development</li>
                                        <li class="list-group-item"><a href="{{ url('css-minifier') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/css-minifier.svg') }}"
                                                    alt="CSS Minifier" title="CSS Minifier" width="20"
                                                    height="20">CSS Minifier</a></li>
                                        <li class="list-group-item"><a href="{{ url('gradient-maker') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/gradient-generator.svg') }}"
                                                    alt="Gradient Generator" title="Gradient Generator"
                                                    width="20" height="20">Gradient Generator</a></li>
                                        <li class="list-group-item"><a href="{{ url('px-to-rem-converter') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/px-rem.svg') }}"
                                                    alt="PX ⇄ REM Converter" title="PX ⇄ REM Converter"
                                                    width="20" height="20"> PX ⇄ REM Converter</a></li>
                                        <li class="list-group-item"><a href="{{ url('px-to-em-converter') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/px-em.svg') }}"
                                                    alt="PX ⇄ EM Converter" title="PX ⇄ EM Converter" width="20"
                                                    height="20"> PX ⇄ EM Converter</a></li>
                                        <li class="list-group-item">
                                            <a href="{{ url('webp-converter') }}"> <img loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/to-webp.svg') }}"
                                                    alt="WEBP Converter" title="WEBP Converter" width="20"
                                                    height="20">WEBP Converter</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ url('dev/animate-preview') }}"> <img loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/to-webp.svg') }}"
                                                    alt="Animation.css Preview" title="Animation.css Preview"
                                                    width="20" height="20">Animation.css Preview</a>
                                        </li>

                                        <li class="tool-category">Converter</li>
                                        <li class="list-group-item"><a href="{{ url('pdf-to-text') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/pdf-to-text-generator.svg') }}"
                                                    alt="PDF to Text Converter" title="PDF to Text Converter"
                                                    width="20" height="20">PDF to Text Converter</a></li>
                                        <li class="list-group-item"><a href="{{ url('case-converter') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/text-converter.svg') }}"
                                                    alt="Text Converter" title="Text Converter" width="20"
                                                    height="20">Text Converter</a></li>

                                        <li class="tool-category">Calculator</li>

                                        <li class="list-group-item"><a href="{{ url('age-calculator') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/age-calculator.svg') }}"
                                                    alt="Age Calculator" title="Age Calculator" width="20"
                                                    height="20">Age Calculator</a></li>

                                        <li class="tool-category">Utility</li>
                                        <li class="list-group-item"><a href="{{ url('pincode-details') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/pincode-details.svg') }}"
                                                    alt="Pincode Details Finder" title="Pincode Details Finder"
                                                    width="20" height="20">Pincode Details Finder</a></li>

                                        <li class="list-group-item"><a href="{{ url('white-board') }}"><img
                                                    loading="lazy"
                                                    src="{{ asset('front-assets/images/icons/white-board.svg') }}"
                                                    alt="White Board" title="White Board" width="20"
                                                    height="20">White Board</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 mt-3">
                            <a href="{{ url('coding-play-ground') }}" class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-coding-ground.svg') }}"
                                    width="36" height="36" alt=" Coding Ground">
                                Coding Ground
                            </a>
                        </div>
                        <div class="col-6 mt-3">
                            <a href="{{ url('free-resume-builder') }}" class="each-category-link">
                                <img src="{{ asset('front-assets/images/icons/nav-resume.svg') }}" width="36"
                                    height="36" alt="Create Resume">
                                Resume Builder
                            </a>
                        </div>

                    </div>

                    {{-- <div class="our-other-category-nav">
                        <p class="our-other-cate-para">Explore Our Other Categories</p>
                        <div class="container-fluid px-0">
                            <div class="row justify-content-center">
                                <div class="sub-nav col-6 mb-3">
                                    <button class="each-category-link">
                                        <img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}"
                                            width="36" height="36" alt="Entertainment">
                                            Entertainment
                                    </button>
                                    <ul class="sub-content list-group" data-title="Entertainment">
                                        <li class="sub-catecory-each-list">
                                            <ul>
                                                 <li class="list-group-item"><a href="https://www.w3coderschool.com/movies/hindi"><img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}" alt="Bollywood Movies">Bollywood Movies</a></li>
                                                 <li class="list-group-item"><a href="https://www.w3coderschool.com/movies/english"><img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}" alt="Hollywood Movies">Hollywood Movies</a></li>
                                                 <li class="list-group-item"><a href="https://www.w3coderschool.com/movies/tamil"><img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}" alt="Tamil Movies">Tamil Movies</a></li>
                                                 <li class="list-group-item"><a href="https://www.w3coderschool.com/movies/telgu"><img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}" alt="Telgu Movies">Telgu Movies</a></li>
                                                 <li class="list-group-item"><a href="https://www.w3coderschool.com/movies/bangla"><img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}" alt="Bangla Movies">Bangla Movies</a></li>
                                                 <li class="list-group-item"><a href="https://www.w3coderschool.com/movies/web-series"><img src="{{ asset('front-assets/images/icons/nav-entertainment.svg') }}" alt=" Web Series">Web Series</a></li>
                                         
                                            </ul>
                                        </li>
                                    </ul>
                                </div>                                
                                <div class="col-6 mb-3">
                                    <a href="{{ url('our-blogs') }}" class="each-category-link">
                                        <img src="{{ asset('front-assets/images/icons/nav-bestof.svg') }}"
                                            width="36" height="36" alt="Travel">
                                        Internet
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ url('health') }}" class="each-category-link">
                                        <img src="{{ asset('front-assets/images/icons/nav-health.svg') }}"
                                            width="36" height="36" alt="Health">
                                        Health
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ url('technology') }}" class="each-category-link">
                                        <img src="{{ asset('front-assets/images/icons/nav-technology.svg') }}"
                                            width="36" height="36" alt="Technology">
                                        Technology
                                    </a>
                                </div>
                                <div class="col-6 mb-3">
                                    <a href="{{ url('travel') }}" class="each-category-link">
                                        <img src="{{ asset('front-assets/images/icons/nav-travel.svg') }}"
                                            width="36" height="36" alt="Travel">
                                        Travel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="offcanvas-bottom-link flex-wrap mt-4">
                        <a href="{{ route('contact-us') }}" aria-label="Contact Us">Contact Us</a>
                        <span>|</span>
                        <a href="{{ route('about-us') }}" aria-label="About Us">About Us</a>
                        <span>|</span>
                        <a href="{{ route('privacy-policy') }}" aria-label="Privacy Policy">Privacy Policy</a>
                        <span>|</span>
                        <a href="{{ route('disclaimer') }}" aria-label="Disclaimer">Disclaimer</a>
                        <span>|</span>
                        <a href="{{ route('terms-and-conditions') }}" aria-label="Terms & Conditions">Terms &
                            Conditions</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="nav_sub" aria-labelledby="nav_subLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="nav_subLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="nav_sub" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"
                        fill="none">
                        <path d="M6.55556 1L1 6.55556L6.55556 12.1111" stroke="#005632" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1 6.55469H9.88889C16.0256 6.55469 21 11.5291 21 17.6658V18.7769" stroke="#005632"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Back
                </button>
            </div>
            <div class="offcanvas-body">
                <div class="sub-menu-content">
                    <!-- THIS WILL BE POPULATED VIA JAVASCRIPT WITH THE CONTENTS OF SUB-NAV -->
                </div>
            </div>
        </div>
        <!-- Nav offcanvas -->
