<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}" alt="ResumeSathi Logo">
    <title>{{ $movie->meta_title }}</title>
    <meta name="description" content="{{ $movie->meta_description }}">
    <meta name="keywords" content="{{ $movie->meta_keyword }}">
    <link rel="canonical" href="{{ url($movie->canonical_tag) }}" />

    <!--- OG meta tags start -->
    <meta property="og:title" content="{{ $movie->meta_title }}" />
    <meta property="og:description" content="{{ $movie->meta_description }}" />
    <meta property="og:type" content="article" />
    <meta property="og:image"
        content="{{ @getImageSize(asset($movie->hero_image)) ? asset($movie->hero_image) : asset('front-assets/images/logos/og-images.png') }}" />
    <meta property="og:url" content="{{ url($movie->canonical_tag) }}" />
    <!--- OG meta tags end -->

    <!-- bootstrap 5 CDN and css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/movies.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">

     {{-- Schema start --}}
     <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Movie",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url($movie->canonical_tag) }}"
          },
          "headline": "{{ $movie->meta_title }}",
          "description": "{{ $movie->meta_description }}",
          "image": "{{ @getImageSize(asset($movie->hero_image)) ? asset($movie->hero_image) : asset('front-assets/images/logos/og-images.png') }}",
          "author": {
            "@type": "Person",
            "name": "ResumeSathi"
          },

          "datePublished": "{{ $movie->created_at->format('Y-m-d\TH:i:sP') }}"
        }
    </script>
{{-- Schema start --}}

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

    {{-- Top nav area start --}}
    @include('frontend.layout.inc.header')
    {{-- Top nav area end --}}

    {{-- Middle area StartS --}}
        <div class="common-container py-5">
            <div class="container-fluid custom-container">
                <div class="row">
                    <!-- ********* Left Part Start********** -->
                    <div class="col-12 col-lg-9">
                        <div class="pb-2">

                            <div class="single-movie-card-div">
                                <img loading="lazy" src="{{ asset('front-assets/images/icons/movie.svg') }}" alt="Movie"
                                    class="img-fluid movie-card-bg-image">
                                <div class="overlay-div"></div>
                                <div>
                                    <div class="movie-absolute-img-div">
                                        <img loading="lazy" src="{{ asset($movie->hero_image) }}" alt="Movie">
                                        @if ($movie->is_upcoming())
                                            <span class="upcomming-latest-label">Upcoming</span>
                                        @endif

                                        @if ($movie->is_latest())
                                            <span class="upcomming-latest-label">Latest</span>
                                        @endif
                                    </div>

                                    @if ($movie->watchlink && $movie->watchlink->platform())
                                        <a @if ($movie->watchlink->link) href="{{ $movie->watchlink->link }}" @endif
                                            target="_blank" class="text-decoration-none" aria-label="Movies">
                                            <div class="movie-label">
                                                <span>
                                                    @if ($movie->watchlink->link)
                                                        watch on
                                                    @else
                                                        Comming Soon
                                                    @endif
                                                </span>
                                                <img loading="lazy" src="{{ $movie->watchlink->platform()->image }}" alt="Platform">
                                            </div>
                                        </a>
                                    @endif

                                    {{-- @if ($movie->booklink && $movie->booklink->platform())
                                        <a href="{{ $movie->booklink->link }}" target="_blank" aria-label="Movies">
                                            <div class="movie-label">
                                                <span>
                                                    book on
                                                </span>
                                                <img loading="lazy" src="{{ $movie->booklink->platform()->image }}" alt="Platform">
                                            </div>
                                        </a>
                                    @endif --}}
                                </div>

                                <div class="movie-details-div">
                                    <h1>{{ $movie->name }}</h1>
                                    <p class="movie-lang">{{ $movie->language_text() }}</p>
                                    <p class="movie-type">{{ $movie->genre_text() }}</p>
                                    <p class="movie-some-details">
                                        @if ($movie->duration)
                                            <span>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 0C3.65117 0 0.125 3.52617 0.125 7.875C0.125 12.2238 3.65117 15.75 8 15.75C12.3488 15.75 15.875 12.2238 15.875 7.875C15.875 3.52617 12.3488 0 8 0ZM11.1025 10.2955L10.5998 10.9811C10.5889 10.996 10.5751 11.0086 10.5593 11.0182C10.5434 11.0278 10.5259 11.0341 10.5076 11.0369C10.4893 11.0397 10.4706 11.0388 10.4527 11.0344C10.4347 11.0299 10.4178 11.0219 10.4029 11.0109L7.49551 8.89102C7.4774 8.87801 7.46267 8.86084 7.45258 8.84096C7.44248 8.82107 7.43731 8.79906 7.4375 8.77676V3.9375C7.4375 3.86016 7.50078 3.79688 7.57812 3.79688H8.42363C8.50098 3.79688 8.56426 3.86016 8.56426 3.9375V8.28809L11.0709 10.1004C11.1342 10.1443 11.1482 10.2322 11.1025 10.2955Z" fill="#000"></path>
                                                </svg>
                                                {{ $movie->duration }}
                                            </span>
                                        @endif
                                        <span>
                                            {{ date_format(date_create($movie->release_date), 'Y') }}
                                        </span>
                                        @if ($movie->seasion)
                                            <span>{{ $movie->seasion }}</span>
                                        @endif
                                        @if ($movie->audience_type)
                                            <span class="sutable-for">
                                                <span>{{ $movie->audience_type }}</span>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="same-para"><span>Director :</span>{{ $movie->director ?? 'N/A' }}</p>
                                    <p class="cast"><span>Casts :</span> {{ $movie->casts ?? 'N/A' }}</p>
                                    @if ($movie->release_date)
                                        <p class="release-date"><span>Release Date
                                                :</span>{{ date_format(date_create($movie->release_date), 'd F, Y') }}</p>
                                    @else
                                        <p class="release-date"><span>Release Date
                                                :</span>Release Soon</p>
                                    @endif
                                </div>
                            </div>
                            @if ($movie->description)
                                <h2 class="movie-all-details-table-heading">{{ $movie->description }}</h2>
                            @endif
                            <div class="table-main-div">
                                <div class="container-fluid p-0 table-responsive">
                                    <table class="table-area">

                                        <thead>
                                            <tr>
                                                <th>Release Date</th>
                                                <td>
                                                    @if ($movie->release_date)
                                                        {{ date_format(date_create($movie->release_date), 'd F, Y') }}
                                                    @else
                                                        Release Soon
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>

                                        <thead>
                                            <tr>
                                                <th>Language</th>
                                                <td>{{ $movie->language_text() }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Dubbed In</th>
                                                <td>{{ $movie->dub_language_text() }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Genre</th>
                                                <td>{{ $movie->genre_text() }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Duration</th>
                                                <td>{{ $movie->duration ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Casts</th>
                                                <td>{{ $movie->casts ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Director</th>
                                                <td>{{ $movie->director ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Writer</th>
                                                <td>{{ $movie->writer ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>

                                        <thead>
                                            <tr>
                                                <th>Cinematography</th>
                                                <td>{{ $movie->cinematography ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>

                                        <thead>
                                            <tr>
                                                <th>Music</th>
                                                <td>{{ $movie->music ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>

                                        <thead>
                                            <tr>
                                                <th>Producer</th>
                                                <td>{{ $movie->producer ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Production</th>
                                                <td>{{ $movie->production ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Certificate</th>
                                                <td>{{ $movie->certificate ?? 'N/A' }}</td>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                            @if ($movie->content)
                                <div class="mt-5 article-content-div movie-content-table">{!! $movie->content->content !!}</div>
                            @endif
                        </div>
                    </div>

                    <!-- ********* Right Part start********** -->
                    @include('movies::layout.front-sidebar')
                    <!-- ********* Right Part End********** -->

                </div>

            </div>
        </div>
    <!-- footer area start -->
    @include('frontend.layout.inc.footer')
    <!-- footer area end -->

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.min.js') }}"></script>
    <script>
        $('.navbar-toggler').click(function() {
            $('.navbar-toggler i').toggleClass('fa-bars')
            $('.navbar-toggler i').toggleClass('fa-xmark')
            $('header .navbar').toggleClass('nav_bar_bg_img')
        })

        // BOTTOM SCROLL TOP BUTTON start
        var scrollTop = $(".scrollTop");
        $(window).scroll(function() {
            var topPos = $(this).scrollTop();
            if (topPos > 100) {
                $(scrollTop).css("opacity", "1");
            } else {
                $(scrollTop).css("opacity", "0");
            }
        });
        $(scrollTop).click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        // BOTTOM SCROLL TOP BUTTON end
    </script>
</body>

</html>
