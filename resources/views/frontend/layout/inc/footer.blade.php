        <!-- Footer Start -->
        <footer class="common-container pt-5">
            <div class="footer-desc-logo">
                <a href="{{ url('/') }}" aria-label="w3coderschool"><img loading="lazy" src="{{ asset('front-assets/images/logos/logo.svg') }}" width="128" height="52"
                        alt="W3CoderSchool"></a>
                <p>Master coding and tech with expert tutorials, hands-on projects, and pro tips for all skill levels.
                </p>
            </div>
            <div class="subscription-div">
                <p>Subscribe for newsletter</p>
                <h5 class="text-success text-center" style="display: none" id="subscribeSuccess"></h5>
                <p class="text-danger text-center" style="display: none" id="subscribeFail"></p>
                <div class="input-div">
                    <input type="email" id="email_id" placeholder="Your email address" required>
                    <button onclick="onsubscribe()" id="subcribeBtn"><img loading="lazy"
                            src="{{ asset('front-assets/images/icons/subscribe-arrow.svg') }}" width="36" height="36" alt="Arrow"></button>
                    <button type="button" style="display: none;" id="subcribeLoader" onclick="onsubscribe()"><img loading="lazy"
                            src="{{ asset('front-assets/images/icons/loading.svg') }}" width="36" height="36" alt="Arrow"></button>
                </div>
            </div>
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="footer-each-links-div text-center text-md-start">
                            <p class="heading-para">Support</p>
                            <ul>
                                <li><a href="{{route('about-us')}}" aria-label="About Us">About Us</a></li>
                                <li><a href="{{route('contact-us')}}" aria-label="Contact Us">Contact Us</a></li>
                                <li><a href="{{ route('disclaimer')}}" aria-label="Disclaimer">Disclaimer</a></li>
                                <li><a href="{{route('privacy-policy')}}" aria-label="Privacy Policy">Privacy Policy</a></li>
                                <li><a href="{{url('terms-and-conditions')}}" aria-label="Terms & Conditions">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="footer-each-links-div text-center text-md-start">
                            <p class="heading-para">Important Links</p>
                            <ul>
                                <li><a href="{{url('free-resume-builder')}}" aria-label="Resume Builder">Resume Builder</a></li>
                                {{-- <li><a href="https://www.w3coderschool.com/movies" aria-label="Entertainment">Entertainment</a></li> --}}
                                {{-- <li><a href="{{url('health')}}" aria-label="Health">Health</a></li> --}}
                                {{-- <li><a href="{{url('technology')}}" aria-label="Technology">Technology</a></li> --}}
                                {{-- <li><a href="{{url('travel')}}" aria-label="Travel">Travel</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="footer-each-links-div contact-links text-center text-md-start">
                            <p class="heading-para">Get in Touch</p>
                            <ul>
                                <li><a href="mailto:edu@w3coderschool.com" target="_blank" aria-label="Email">edu@w3coderschool.com</a></li>
                                <li><a href="https://www.w3coderschool.com" target="_blank" aria-label="Website">www.w3coderschool.com</a></li>
                            </ul>
                            <div class="footer-social-icons justify-content-center justify-content-md-start">
                                <a href="https://www.facebook.com/w3coderschool/" target="_blank" aria-label="Facebook"><img loading="lazy" src="{{ asset('front-assets/images/icons/facebook.svg')}}" width="17"
                                        height="26" alt="Facebook"></a>
                                <a href="https://in.pinterest.com/w3coderschool/" target="_blank" aria-label="Pinterest"><img loading="lazy" src="{{ asset('front-assets/images/icons/pinterest.svg')}}" width="20"
                                        height="26" alt="Pinterest"></a>
                                {{-- <a href="javascript:void(0)" target="_blank" aria-label="Play Store"><img loading="lazy" src="{{ asset('front-assets/images/icons/play-store.svg')}}" width="25"
                                        height="26" alt="Play Store"></a> --}}
                                <a href="https://www.instagram.com/w3coderschool/" target="_blank" aria-label="Instagram"><img loading="lazy" src="{{ asset('front-assets/images/icons/instagram.svg')}}" width="26"
                                        height="26" alt="Instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                W3CoderSchool © <span><?php echo date('Y'); ?></span>. All Rights Reserved
            </div>
        </footer>
        <!-- Footer End -->

        <a href="#top" id="scroll-to-top-btn" aria-label="Scrool Top">↑</a>