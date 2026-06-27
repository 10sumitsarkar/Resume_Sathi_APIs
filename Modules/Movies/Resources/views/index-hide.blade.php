@extends('frontend.layout.master')
@section('title',
    'Bollywood, Hollywood, Tollywood, Kollywood Movies & Web')
@section('description',
    'Find the list of latest hindi movies, english movies, tamil movies, telgu movies, bangla movies
    and Web Series from youtube, offline theater and various OTT platforms like Netflix, Amazon Prime Video, ZEE5, Disney+
    Hotstar and other with trailer, cast.')
@section('keywords',
    'new tamil movies, latest tamil movies, new tamil movies trailers, best tamil movies, tamil tamil
    movies, english tamil movies, new telgu movies, latest telgu movies, new telgu movies trailers, best telgu movies, telgu
    telgu movies, english telgu movies, new bangla movies, latest bangla movies, new bangla movies trailers, best bangla
    movies, bangla bangla movies, english bangla movies, new hindi movies, latest hindi movies, new hindi movies trailers,
    best hindi movies, hindi hindi movies, english hindi movies ,web series, latest web series, new web series trailers,
    best web series, hindi web series, english web series')

@section('og-title',
    '            Series')
@section('og-description',
    'Find the list latest of hindi movies, english movies, tamil movies, telgu movies, bangla movies
    and Web Series from youtube, offline theater and various OTT platforms like Netflix, Amazon Prime Video, ZEE5, Disney+
    Hotstar and other with trailer, cast.')
@section('og-url', 'https://www.w3coderschool.com/movies')
@section('content')
    <link rel="stylesheet" href="{{ asset('front-assets/css/movies.css') }}">
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <div class="common-container pt-3 pt-md-5">
        <h1 class="topics-heading p-0 mb-2" id="button-focused">Bollywood, Hollywood, Tollywood, Kollywood Movies & Web
            Series</h1>
        <p class="topics-heading-para m-0">If you want to know the movies released this week, check this page for the latest
            in cinemas or on streaming platforms like Netflix, Amazon Prime, and Disney+ Hotstar.</p>
    </div>
    <section class="pb-4 mt-5">
        <div class="common-container">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-9">
                        <div class="pb-2">
                            <div class="all-movie-type">
                                <div class="nav">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('all-movies', $category->url_name) }}"
                                            class="tab-btn {{ intval($category->id) === intval($category_id) ? 'active' : '' }}" aria-label="{{ $category->name }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="latest-upcomming-movies">
                                <div class="nav" id="nav-tab" role="tablist">
                                    <button class="tab-btn active" id="nav-latest-movie-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-latest-movie">Latest
                                        Movies</button>
                                    <button class="tab-btn" id="nav-upcomming-movie-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-upcomming-movie">Upcomming Movies</button>
                                    <button class="tab-btn" id="nav-all-movie-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-all-movie">All
                                        Movies</button>
                                </div>
                            </div>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-latest-movie">
                                    <div class="container-fluid px-0">
                                        <div class="row">
                                            @foreach ($movies as $movie)
                                                @if (!$movie->is_upcoming())
                                                    <div class="col-md-6 mb-3 each-movie-parent">
                                                        <div class="each-movie-card">
                                                            <div>
                                                                <div class="movie-card-left">
                                                                    <div class="card-movie-banner">
                                                                        <a href="{{ URL($movie->canonical_tag) }}" aria-label="Movies">
                                                                            <img loading="lazy" src="{{ asset($movie->hero_image) }}"
                                                                                class="img-fluid" alt="Movie">
                                                                        </a>
                                                                    </div>
                                                                    @if ($movie->watchlink && $movie->watchlink->platform())
                                                                        {{-- {{ $movie->watchlink->link }} --}}
                                                                        <a href="{{ URL($movie->canonical_tag) }}" aria-label="Movies"
                                                                            class="text-decoration-none">
                                                                            <div class="movie-label">
                                                                                <span>
                                                                                    @if ($movie->watchlink->link)
                                                                                        watch on
                                                                                    @else
                                                                                        Comming
                                                                                    @endif
                                                                                </span>
                                                                                <img loading="lazy" src="{{ $movie->watchlink->platform()->image }}"
                                                                                    alt="Platform">
                                                                            </div>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="movie-card-right">
                                                                <h3>{{ $movie->name }}</h3>
                                                                <p class="movie-carecters">{{ $movie->casts }}</p>
                                                                <p class="release-date"><span>Release
                                                                        Date</span>
                                                                    @if ($movie->release_date)
                                                                        {{ date_format(date_create($movie->release_date), 'd M, Y') }}
                                                                    @else
                                                                        Release Soon
                                                                    @endif
                                                                </p>
                                                                <p class="director"><span>Director</span>
                                                                    {{ $movie->director }}
                                                                </p>
                                                                <a href="{{ URL($movie->canonical_tag) }}" aria-label="Movies"
                                                                    class="view-btn">view</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="pagination" class="post-pagination-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-upcomming-movie">
                                    <div class="container-fluid px-0">
                                        <div class="row">
                                            @foreach ($upcomingMovies as $movie)
                                                @if ($movie->is_upcoming())
                                                    <div class="col-md-6 mb-3 each-movie-parent">
                                                        <div class="each-movie-card">
                                                            <div>
                                                                <div class="movie-card-left">
                                                                    <div class="card-movie-banner">
                                                                        <a href="{{ URL($movie->canonical_tag) }}" aria-label="Movies">
                                                                            <img loading="lazy" src="{{ asset($movie->hero_image) }}"
                                                                                class="img-fluid" alt="Movie">
                                                                        </a>
                                                                    </div>

                                                                    @if ($movie->watchlink && $movie->watchlink->platform())
                                                                        {{-- {{ $movie->watchlink->link }} --}}
                                                                        <a href="{{ URL($movie->canonical_tag) }}"
                                                                            class="text-decoration-none" aria-label="Movies">
                                                                            <div class="movie-label">
                                                                                <span>
                                                                                    @if ($movie->watchlink->link)
                                                                                        watch on
                                                                                    @else
                                                                                        Comming
                                                                                    @endif
                                                                                </span>
                                                                                <img loading="lazy" src="{{ $movie->watchlink->platform()->image }}"
                                                                                    alt="Platform">
                                                                            </div>
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                            <div class="movie-card-right">
                                                                <h3>{{ $movie->name }}</h3>
                                                                <p class="movie-carecters">{{ $movie->casts }}</p>
                                                                <p class="release-date"><span>Release
                                                                        Date</span>
                                                                    @if ($movie->release_date)
                                                                        {{ date_format(date_create($movie->release_date), 'd M, Y') }}
                                                                    @else
                                                                        Release Soon
                                                                    @endif
                                                                </p>
                                                                <p class="director">
                                                                    <span>Director</span> {{ $movie->director }}
                                                                </p>
                                                                <a href="{{ URL($movie->canonical_tag) }}"
                                                                    class="view-btn" aria-label="Movies">view</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="pagination" class="post-pagination-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-all-movie">
                                    <div class="container-fluid px-0">
                                        <div class="row">
                                            @foreach ($movies as $movie)
                                                <div class="col-md-6 mb-3 each-movie-parent">
                                                    <div class="each-movie-card">
                                                        <div>
                                                            <div class="movie-card-left">
                                                                <div class="card-movie-banner">
                                                                    @if ($movie->is_upcoming())
                                                                        <span class="upcomming-latest-label">Upcoming</span>
                                                                    @endif
                                                                    @if ($movie->is_latest())
                                                                        <span class="upcomming-latest-label">Latest</span>
                                                                    @endif
                                                                    <a href="{{ URL($movie->canonical_tag) }}" aria-label="Movies">
                                                                        <img loading="lazy" src="{{ asset($movie->hero_image) }}"
                                                                            class="img-fluid" alt="Movie">
                                                                    </a>
                                                                </div>

                                                                @if ($movie->watchlink && $movie->watchlink->platform())
                                                                    {{-- {{ $movie->watchlink->link }} --}}
                                                                    <a href="{{ URL($movie->canonical_tag) }}"
                                                                        class="text-decoration-none" aria-label="Movies">
                                                                        <div class="movie-label">
                                                                            <span>
                                                                                @if ($movie->watchlink->link)
                                                                                    watch on
                                                                                @else
                                                                                    Comming
                                                                                @endif
                                                                            </span>
                                                                            <img loading="lazy" src="{{ $movie->watchlink->platform()->image }}"
                                                                                alt="Platform">
                                                                        </div>
                                                                    </a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="movie-card-right">
                                                            <a href="{{ URL($movie->canonical_tag) }}" aria-label="Movies">
                                                                <h3>{{ $movie->name }}</h3>
                                                            </a>
                                                            <p class="movie-carecters">{{ $movie->casts }}</p>
                                                            <p class="release-date"><span>
                                                                    @if ($movie->release_date)
                                                                        {{ date_format(date_create($movie->release_date), 'd M, Y') }}
                                                                    @else
                                                                        Release Soon
                                                                    @endif
                                                            </p>
                                                            <p class="director"><span>Director</span>
                                                                {{ $movie->director }}
                                                            </p>
                                                            <a href="{{ URL($movie->canonical_tag) }}"
                                                                class="view-btn" aria-label="Movies">view</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="pagination" class="post-pagination-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('movies::layout.front-sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-script')
    <script>
        const tabAccess = document.querySelectorAll('.tab-content .tab-pane');

        // Function to show specific page of cards
        function showPage(movies, page, cardsPerPage) {
            movies.forEach(movie => {
                movie.closest('.each-movie-parent').style.display = 'none';
            });

            const start = (page - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            for (let i = start; i < end && i < movies.length; i++) {
                movies[i].closest('.each-movie-parent').style.display = 'block';
            }
        }

        // Function to update pagination and set active page
        function updatePagination(paginationContainer, currentPage, totalPages, showPageCallback) {
            const maxVisiblePages = 3;
            const startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
            const endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

            // Clear existing pagination
            paginationContainer.innerHTML = '';

            // Create Previous Button
            const previousBtn = createPaginationButton('«', currentPage > 1, () => {
                showPageCallback(currentPage - 1);
            });
            paginationContainer.appendChild(previousBtn);

            // Add page number buttons
            for (let i = startPage; i <= endPage; i++) {
                const pageLink = createPaginationButton(i, true, () => {
                    showPageCallback(i);
                });

                // Mark the current page as active using data-page attribute
                if (i === currentPage) {
                    pageLink.classList.add('active');
                }

                pageLink.setAttribute('data-page', i);
                paginationContainer.appendChild(pageLink);
            }

            // Create Next Button
            const nextBtn = createPaginationButton('»', currentPage < totalPages, () => {
                showPageCallback(currentPage + 1);
            });
            paginationContainer.appendChild(nextBtn);
        }

        // Helper function to create pagination buttons
        function createPaginationButton(text, enabled, onClick) {
            const button = document.createElement('button');
            button.textContent = text;
            button.classList.add('page-link');
            button.disabled = !enabled;
            if (enabled) button.addEventListener('click', onClick);
            return button;
        }

        // Main function to handle tab switching and pagination
        function showCardFun() {
            tabAccess.forEach((eachTabAccess, index) => {
                if (eachTabAccess.classList.contains('active')) {
                    const movies = eachTabAccess.querySelectorAll('.each-movie-card');
                    const totalCards = movies.length;
                    const cardsPerPage = 8;
                    const totalPages = Math.ceil(totalCards / cardsPerPage);
                    const paginationContainer = eachTabAccess.querySelector('.post-pagination-container');
                    let currentPage = 1;

                    const showPageCallback = (page) => {
                        currentPage = page;
                        showPage(movies, page, cardsPerPage);
                        updatePagination(paginationContainer, currentPage, totalPages, showPageCallback);

                        // Update active state for pagination links using data-page attribute
                        const allPageLinks = paginationContainer.querySelectorAll('.page-link');
                        allPageLinks.forEach(link => link.classList.remove('active'));

                        const activePageLink = paginationContainer.querySelector(
                            `.page-link[data-page="${currentPage}"]`);
                        if (activePageLink) {
                            activePageLink.classList.add('active');
                        }
                    };

                    showPageCallback(1);
                }
            });
        }

        // Event listener for initial load and tab click
        document.addEventListener("DOMContentLoaded", showCardFun);
        document.querySelectorAll('.tab-btn').forEach(tabBtn => {
            tabBtn.addEventListener('click', showCardFun);
        });
    </script>
@endsection
