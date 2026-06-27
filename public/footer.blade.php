<footer>
    <div class="container">
        <a href="{{ url('/') }}"><img src="{{ asset('front-assets/images/logo/logo.svg') }}" alt="w3coderschool"
                class="img-fluid d-block mx-auto" width="194" height="50" loading="lazy"></a>
        <label class="subscribe-label">Subscribe for newsletter</label>
        <form action="">
            <h5 class="text-white" style="display: none" id="subscribeSuccess"></h5>
            <p class="text-warning" style="display: none" id="subscribeFail"></p>
            <div class="subscribe-input">
                <input type="email" id="email_id" placeholder="Your email address" required>
                <button onclick="onsubscribe()" id="subcribeBtn">Subscribe</button>
                <button class="bg-warning" style="display: none;" id="subcribeLoader" onclick="onsubscribe()"><img
                        src="{{ asset('front-assets/images/icons/loading.svg') }}" alt="Loading" loading="lazy" width="8" height="13"></button>
            </div>
        </form>
        <div class="row mt-4">
            <div class="col-md-4 mt-4">
                <div class="footer-each-links">
                    <p>Support</p>
                    <ul>
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('terms-and-condition') }}">Term & Condition</a></li>
                        <li><a href="{{ url('sitemap.xml') }}">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="footer-each-links">
                    <p>Important Links</p>
                    <ul>
                        <li><a href="{{ url('programming-tutorial') }}">Programming</a></li>
                        <li><a href="{{ url('snippets') }}">UI Code Snippets</a></li>
                        <li><a href="{{ url('html-entity') }}">HTML Symbols</a></li>
                        <li><a href="{{ url('tools') }}">Online Tools</a></li>
                        <li><a href="{{ url('entertainment') }}">Entertainment</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="footer-each-links">
                    <p>Get in Touch</p>
                    <ul>
                        <li><a href="mailto:edu@w3coderschool.com">edu@w3coderschool.com</a></li>
                        <li><a href="www.w3coderschool.com">www.w3coderschool.com</a></li>
                        <li>
                            <div class="footer-socia-icons">
                                <a href="https://in.pinterest.com/w3coderschool/_created/" target="_blank" aria-label="Pinterest">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.07478 0C4.01339 0 0 2.70626 0 7.08843C0 9.87468 1.56632 11.4586 2.51667 11.4586C2.90865 11.4586 3.13584 10.3659 3.13584 10.0571C3.13584 9.68909 2.19669 8.90513 2.19669 7.37321C2.19669 4.19098 4.61896 1.9359 7.75399 1.9359C10.4499 1.9359 12.4449 3.46702 12.4449 6.28127C12.4449 8.38276 11.601 12.3242 8.86914 12.3242C7.88439 12.3242 7.04203 11.6122 7.04203 10.5914C7.04203 9.09552 7.99958 7.6468 7.99958 6.10288C7.99958 3.48222 4.37017 3.95739 4.37017 7.12443C4.37017 7.78919 4.45337 8.52515 4.75015 9.13072C4.20378 11.4826 3.19983 15.2288 3.19983 17.6519C3.19983 18.3998 3.30703 19.1358 3.37822 19.8846C3.51262 20.035 3.44542 20.0198 3.65101 19.9446C5.6461 17.2135 5.46131 16.4343 6.36367 12.8601C6.85164 13.7865 8.10998 14.2849 9.10752 14.2849C13.3113 14.2849 15.1992 10.1891 15.1992 6.49486C15.1992 2.56467 11.8034 0 8.07478 0Z"
                                            fill="#027A48" />
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/w3coderschool.edu/" target="_blank" aria-label="Facebook">
                                    <svg width="13" height="20" viewBox="0 0 13 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.77866 20L3.75 11.25H0V7.5H3.75V5C3.75 1.626 5.83939 0 8.84923 0C10.291 0 11.5301 0.107338 11.8912 0.155313V3.68134L9.8037 3.68229C8.16679 3.68229 7.84984 4.46012 7.84984 5.60155V7.5H12.5L11.25 11.25H7.84982V20H3.77866Z"
                                            fill="#027A48" />
                                    </svg>
                                </a>
                                <a href="https://twitter.com/edu_w3coderschool" target="_blank" aria-label="Twitter">
                                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 1.93826C19.288 2.31001 18.2105 2.48643 17.8576 2.53684C17.8576 2.51793 17.8513 2.50533 17.8513 2.48643C19.0548 1.73033 19.4266 0.318947 19.4266 0.318947C18.6767 0.747403 18.0151 0.986834 17.5173 1.11915C17.2401 1.19476 17.0069 1.23257 16.8431 1.25777C16.087 0.482768 15.0347 0.00390625 13.8689 0.00390625C11.5753 0.00390625 9.71015 1.86265 9.71015 4.16245C9.71015 4.24436 9.71014 4.32627 9.71645 4.40818C9.72905 4.60981 9.75425 4.80513 9.79206 4.99415C8.68305 4.97525 4.66919 4.63501 1.34215 0.772606C1.34215 0.772606 -0.510397 4.00493 2.60239 6.21021C2.60239 6.21021 1.34216 6.17241 0.674228 5.69985C0.674228 5.69985 0.478891 8.81245 4.06427 9.79538C4.06427 9.79538 2.80403 10.1104 2.17391 9.83318C2.17391 9.83318 2.80403 12.511 5.95463 12.7064C5.95463 12.7064 3.6925 14.773 0 14.4769C1.81474 15.6236 3.96975 16.2915 6.27599 16.2915C12.7662 16.2915 18.0277 11.0303 18.0277 4.5405C18.0277 4.45859 18.0277 4.37667 18.0277 4.29476C18.0277 4.24436 18.0277 4.20025 18.0277 4.14985C18.0277 4.11834 18.0277 4.08054 18.0277 4.04903C19.225 3.26143 20 1.93826 20 1.93826Z"
                                            fill="#027A48" />
                                    </svg>
                                </a>
                                <a href="https://www.apkfiles.com/apk-608925/w3coderschool" target="_blank" aria-label="apkfiles">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.95661 9.56524L13.2447 6.27713L2.62426 0.308055C1.92038 -0.0722396 1.26098 -0.125614 0.682752 0.290264L9.95661 9.56524ZM13.8052 13.4149L17.2234 11.4923C17.8905 11.1187 18.2564 10.5894 18.2564 10.0022C18.2564 9.41623 17.8905 8.88582 17.2245 8.5122L14.1299 6.77418L10.646 10.2569L13.8052 13.4149ZM0.111197 1.09867C0.040031 1.31773 0 1.56236 0 1.83035V18.1819C0 18.6056 0.0934059 18.9703 0.262426 19.2605L9.26608 10.2558L0.111197 1.09867ZM9.95661 10.9452L1.003 19.8999C1.17424 19.9655 1.35883 20 1.55343 20C1.90036 20 2.26175 19.8977 2.62982 19.6931L12.9211 13.9142L9.95661 10.9452Z"
                                            fill="#027A48" />
                                    </svg>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p class="bottom-para">Copyright <?php echo date('Y'); ?> w3coderschool@All Right Reserved</p>
</footer>

<div class="offcanvas offcanvas-end nav-offcanvas" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel" aria-modal="true" role="dialog" aria-label="Catetegories">
    <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="each-links-div" id="each-link-1">
            <div class="canvas-link">
                <span>Our Courses</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                @foreach (our_courses() as $item)
                    <a href="{{ route('course', $item->id) }}">{{ $item->course_name }}</a>
                @endforeach
            </div>
        </div>
        <div class="each-links-div" id="each-link-2">
            <div class="canvas-link">
                <span>Programming Tutorial</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                @foreach (our_tutorials() as $item)
                    <a href="{{ route('our-tutorials', $item->url_name) }}">{{ $item->title }}</a>
                @endforeach
            </div>
        </div>
        <div class="each-links-div" id="each-link-3">
            <div class="canvas-link">
                <span>Code Snippets</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                @foreach (our_snipits() as $item)
                    <a href="{{ route('code-snipits', $item->url_name) }}">{{ $item->title }}</a>
                @endforeach

            </div>
        </div>
        <div class="each-links-div" id="each-link-4">
            <div class="canvas-link">
                <span>HTML Entity</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                @foreach (getHtmlSymbolCategories() as $item)
                    <a href="{{ url($item->canonical_tag) }}">
                        {{ $item->symbol }} {{ $item->name }}
                    </a>
                @endforeach

            </div>
        </div>
        <div class="each-links-div" id="each-link-5">
            <div class="canvas-link">
                <span>Best Of</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                <a href="{{ url('our-blogs') }}">Internet</a>
                <a href="{{ url('technology') }}">Technology</a>
                <a href="{{ url('health') }}">Health</a>
                <a href="{{ url('travel') }}">Travel</a>
            </div>
        </div>
        <div class="each-links-div" id="each-link-6">
            <div class="canvas-link">
                <span>Onine Tools</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                <a href="{{ url('css-minifier') }}">CSS Minifier</a>
                <a href="{{ url('case-converter') }}">Text Conerter</a>
                <a href="{{ url('age-calculator') }}">Age Calculator</a>
                <a href="{{ url('pincode-details') }}">Pincode Details</a>
                <a href="{{ url('white-board') }}">Whiteboard</a>
                <a href="{{ url('pdf-to-text') }}">PDF to Text</a>
                <a href="{{ url('gradient-maker') }}">Gradient Generator</a>
                <a href="{{ url('px-to-rem-converter') }}">PX to REM Converter</a>
                <a href="{{ url('rem-to-px-converter') }}">REM to PX Converter</a>
                <a href="{{ url('px-to-em-converter') }}">PX to EM Converter</a>
                <a href="{{ url('rem-to-px-converter') }}">EM to PX Converter</a>
            </div>
        </div>
        <div class="each-links-div" id="each-link-7">
            <div class="canvas-link">
                <span>Latest & Upcoming movies</span>
                <img src="{{ asset('front-assets/images/icons/drop-arrow.svg') }}" alt="Arrow" width="8" height="13" loading="lazy">
            </div>
            <div class="nav-category-dropdown">
                <a href="{{ url('movies/hindi') }}">Bollywood</a>
                <a href="{{ url('movies/english') }}">Hollywood</a>
                <a href="{{ url('movies/tamil') }}">Tamil</a>
                <a href="{{ url('movies/telgu') }}">Telgu</a>
                <a href="{{ url('movies/bangla') }}">Bangla</a>
                <a href="{{ url('movies/web-series') }}">Web Series</a>
            </div>
        </div>
    </div>
</div>
<script>
    var canvasLink = document.querySelectorAll('.each-links-div')
    var eachCanvasDropdown = document.querySelectorAll('.nav-category-dropdown')
    canvasLink.forEach(function(eachCanvasLink) {
        eachCanvasLink.addEventListener('click', function(e) {
            for (let i = 1; i <= eachCanvasDropdown.length; i++) {
                document.getElementById('each-link-' + i).classList.remove('active')
            }
            var linkAttr = this.getAttribute('id')
            document.getElementById(linkAttr).classList.add('active')
        })
    })
</script>
