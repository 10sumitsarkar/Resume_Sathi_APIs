<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}"
        alt="W3CoderSchool Logo">
    <title>{{ $article->meta_title }}</title>
    <meta name="description" content="{{ $article->meta_description }}">
    <meta name="keywords" content="{{ $article->meta_keyword }}">
    <link rel="canonical" href="{{ url($article->canonical_tag) }}" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="{{ $article->meta_title }}" />
    <meta property="og:description" content="{{ $article->meta_description }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image"
        content="{{ @getImageSize(asset($article->hero_image)) ? asset($article->hero_image) : asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="{{ url($article->canonical_tag) }}" />
    <!--- OG meta tags end -->

    <!-- Preloded CSS start -->
    <link rel="preload" as="style" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="preload" as="style" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="preload" as="style" href="{{ asset('front-assets/css/responsive.css') }}">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap">
    <link rel="preload" as="style" href="{{ asset('dashboard-assets/vendors/css/prism.css') }}">
    <!-- Preloded CSS end-->

    <!-- Regular CSS Start -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/css/prism.css') }}">
    <!-- Regular CSS End -->

    {{-- Schema start --}}
    <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Article",
              "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url($article->canonical_tag) }}"
              },
              "headline": "{{ $article->meta_title }}",
              "description": "{{ $article->meta_description }}",
              "image": "{{asset($article->hero_image)}}", 
              "author": {
                "@type": "Person",
                "name": "W3CoderSchool"
              }, 
             
              "datePublished": "{{ $article->created_at->format('Y-m-d\TH:i:sP') }}"
            }
        </script>
    {{-- Schema start --}}

     {{-- Google Ads Start --}}
     @include('frontend.layout.inc.ads.auto-ads')
     {{-- Google Ads End --}}

    {{-- Google analytics code start --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L3QP8NJR3K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
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
    <!-- Header Start -->
    <div class="common-container pt-3 pt-md-5">
        <h1 class="topics-heading" id="button-focused">{{ $article->article_title }}</h1>
    </div>
    <!-- Header End -->
    <div class="common-container mt-3 mt-md-5">
        <div class="container-fluid px-0">
            <div class="row">
                <!-- Left Part Start -->
                <div class="col-lg-8 col-xl-9">
                    <div class="article-details-div">
                        <div class="left-part">
                            <p><img loading="lazy"
                                    src="{{ asset('front-assets/images/icons/single-post-author.svg') }}"
                                    alt="Author">{{ $article->user->first_name }} {{ $article->user->last_name }}
                            </p>
                            <p><img loading="lazy" src="{{ asset('front-assets/images/icons/single-post-date.svg') }}"
                                    alt="Date">{{ Carbon::parse($article->created_at)->format('d M Y') }}</p>
                        </div>
                        <div class="right-part">
                            <p><img loading="lazy"
                                    src="{{ asset('front-assets/images/icons/single-post-category.svg') }}"
                                    alt="Category">{{ $article->language ? $article->language->title : 'Article' }}</p>
                        </div>
                    </div>

                    <div class="article-content-div my-4">
                        {!! $article->content->content !!}
                    </div>

                    <div class="article-comment-div mb-5">
                        <div class="header-div">
                            Comments
                            <span class="total_comments">16</span>
                        </div>

                        <div class="px-2 px-lg-4">
                            <div class="commenter-detail-div mt-4" id="comment_list_div">

                            </div>

                            <div class="add-comment-area mt-4">
                                <p class="mb-2">Leave a comment</p>
                                <form action="javascript:void(0)" class="comment_form" onsubmit="postComment()">
                                    <textarea id="comment_text" class="commentArea" placeholder="Write your comment" rows="3"></textarea>
                                    <button type='submit' id="comment_submit_btn">Leave Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- Left Part End -->

                <!-- Right Part Start -->
                <div class="col-lg-4 col-xl-3">
                    <!-- Google search Start -->
                    <div class="right_search_input">
                        @include('frontend.layout.inc.sidebar-components.search-adsense')
                    </div>
                    <!-- Google search End -->

                    <!-- Popular posts start -->
                    <div class="each-side-bar-post-div mb-3">
                        <h4 class="heading">Latest Posts</h4>
                        <ul>
                            @foreach ($latest as $item)
                                <li><a href="{{ url($item->canonical_tag) }}"
                                        aria-label="{{ $item->article_title }}">{{ $item->article_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Popular posts end -->

                    <!-- Tutorial categories start -->
                    <div class="each-side-bar-category-div mb-3">
                        <h4 class="heading">Related Categories</h4>
                        <div class="container-fluid px-0">
                            <div class="row">
                                @foreach (our_tutorials() as $item)
                                    <div class="col-6 col-md-3 col-lg-6 px-1 mt-2">
                                        <a href="{{ route('our-tutorials', $item->url_name) }}"
                                            aria-label="{{ $item->url_name }}">
                                            <h5 class="each-category">
                                                {{ $item->url_name }}
                                            </h5>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Tutorial categories end -->

                    <!-- Popular snippets start -->
                    <div class="each-side-bar-post-div mb-3">
                        <h4 class="heading">Popular Snippets</h4>
                        <ul>
                            @foreach ($snipits as $snipit)
                                <li @if (strpos($snipit->canonical_tag, 'preview-snippets') !== false) class="d-none" @endif><a href="{{ url($snipit->canonical_tag) }}"
                                        aria-label="{{ $snipit->title }}">{{ $snipit->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Popular snippets end -->
                </div>
                <!-- Right Part End -->
            </div>
            <!-- Resume start -->
            @include('frontend.layout.inc.resume-banner')
            <!-- Resume end -->
        </div>
    </div>

    {{-- Comment Modal --}}
    <div class="modal fade" id="CommentModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title comment_modal_head">Enter your details before comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="CommentModalForm">
                        <div class="common_inputs"><img loading="lazy"
                                src="{{ asset('front-assets/images/icons/user-name.svg') }}" alt="User"><input
                                type="text" id="comment_user_name" placeholder="Your Name*"
                                oninput="hideError('comment_user_name_error')"></div>
                        <small class="text-danger" id="comment_user_name_error" style="display:none">This field
                            is required.</small>
                        <div class="common_inputs"><img loading="lazy"
                                src="{{ asset('front-assets/images/icons/email-address.svg') }}" alt="Mail">
                            <input type="text" placeholder="Enter Your Email*" id="comment_user_email"
                                oninput="hideError('comment_user_email_error')"></div>
                        <small class="text-danger" id="comment_user_email_error" style="display:none">Please
                            enter a valid email.</small>
                        <div class="pre_cmnt_sbmt_btn">
                            <button type="submit" class="btn mt-3">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layout.inc.footer')

    <script src="{{ asset('dashboard-assets/vendors/js/prism.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>
    <script>
        $('.commentArea').click(function() {
            if (!localStorage.getItem('user_details')) {
                $("#CommentModal").modal('show');
            }
        })

        $(document).ready(function() {
            getComments();
            $("#myModal").modal('show');
        });

        function hideError(id) {
            $('#' + id).hide();
        }

        function showError(id) {
            $('#' + id).show();
        }

        $('#CommentModalForm').submit((e) => {
            e.preventDefault();
            let valid = true;
            var name = $('#comment_user_name').val();
            var email = $('#comment_user_email').val();
            if (!name) {
                valid = false;
                showError('comment_user_name_error');
            } else {
                hideError('comment_user_name_error');
            }

            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                valid = false;
                showError('comment_user_email_error');
            } else {
                hideError('comment_user_email_error');
            }

            if (valid) {
                var data = JSON.stringify([name, email]);
                localStorage.setItem('user_details', data);
                $("#CommentModal").modal('hide');
            }
        })

        function postComment() {
            var text = $('#comment_text').val();
            var user = JSON.parse(localStorage.getItem('user_details'));
            $('#comment_submit_btn').text('Please wait...');
            console.log(user);
            $.ajax({
                type: 'post',
                data: {
                    text: text,
                    name: user[0],
                    email: user[1],
                    article_id: "{{ $article->id }}",
                    _token: "{{ csrf_token() }}"
                },
                url: "{{ url('articles/comment') }}",
                success: function(response) {
                    console.log(response);
                    $('#comment_text').val('');
                    $('#comment_list_div').html(response.html);
                    $('.total_comments').text(response.total);
                    $('#comment_submit_btn').text('Leave Comment');
                }
            }).catch(function(error) {
                console.log(error.responseJSON);
                $('#comment_submit_btn').text('Leave Comment');
                alert(error.responseJSON.message || 'Something went worng.');
            })
        }

        function getComments() {
            var id = "{{ $article->id }}";
            $.ajax({
                type: 'get',
                url: "{{ url('article-comments') }}/" + id,
                success: function(response) {
                    $('#comment_list_div').html(response.html);
                    $('.total_comments').text(response.total);
                }
            })
        }
        // Incontent Output JS
        var mainOutputDiv = document.querySelectorAll('.each-output-div');
        mainOutputDiv.forEach(function(eachMainOutputDiv) {
            var code = eachMainOutputDiv.querySelector('.htmlCssJsCode').value;
            var outputDiv = eachMainOutputDiv.querySelector('.output');
            outputDiv.innerHTML = '';
            var iframe = document.createElement('iframe');
            iframe.setAttribute('sandbox', 'allow-same-origin allow-scripts allow-popups allow-modals');
            outputDiv.appendChild(iframe);
            var iframeDocument = iframe.contentWindow.document;
            iframeDocument.open();
            iframeDocument.write(code);
            iframeDocument.close();
        })
    </script>
</body>

</html>
