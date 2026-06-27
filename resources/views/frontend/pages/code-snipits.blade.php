@extends('frontend.layout.master')
@section('title', 'Code Snippets')
@section('description', 'Unlock efficient coding solutions with our curated collection of versatile code snippets')
@section('keywords',
    'Code examples, Programming snippets, Coding samples, Script snippets, Code references, Developer
    snippets, Programming solutions, Coding shortcuts, Code library, Code repository, Syntax examples, Software snippets,
    Programming techniques, Code hacks, Quick code references, w3coderschool')
@section('canonical', $snipit_category ? 'https://www.w3coderschool.com/code-snipits/' . $snipit_category->url_name :
    'https://www.w3coderschool.com/code-snipits')
@section('og-title', 'Code Snippets - w3coderschool')
@section('og-description', 'Unlock efficient coding solutions with our curated collection of versatile code snippets')
@section('og-url', $snipit_category ? 'https://www.w3coderschool.com/code-snipits/' . $snipit_category->url_name :
    'https://www.w3coderschool.com/code-snipits')
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp

    <!-- Header Start -->
    <div class="common-container pt-5">
        <h1 class="topics-heading" id="button-focused">{{ $snipit_category ? $snipit_category->title : 'Code' }}
            <span>Snipits</span>
        </h1>
    </div>
    <!-- Header End -->
    <div class="common-container mt-5">
        <div class="container-fluid px-0">
            <div class="row">
                <!-- Left Part Start -->
                <div class="col-lg-8 col-xl-9">
                    <div class="container-fluid px-0">
                        <div class="row">
                            @foreach ($snipits as $item)
                                <div class="col-sm-6 col-lg-6 col-xl-4 mb-4 each-post-parent">
                                    <a href="{{ asset($item->canonical_tag) }}" class="each-posts-card" aria-label="{{ $item->title }}">
                                        <div class="img-div">
                                            <img loading="lazy" src="{{ asset($item->hero_image) }}" class="img-fluid"
                                                alt="{{ $item->title }}" title="{{ $item->title }}">
                                            <div class="post-date-and-view">
                                                <p>
                                                    <img loading="lazy" src="{{ asset('front-assets/images/icons/post-date.svg') }}"
                                                        alt="Date">
                                                    {{ Carbon::parse($item->created_at)->format('d M Y') }}
                                                </p>
                                                <p>
                                                    <img loading="lazy" src="{{ asset('front-assets/images/icons/post-view.svg') }}"
                                                        alt="Views">
                                                    {{ $item->pageview }}
                                                </p>
                                            </div>
                                        </div>
                                        <h2 class="mb-4 pb-5">{{ $item->title }}</h2>
                                        <button class="learning-btn">
                                            Get code
                                            <span><img loading="lazy" src="{{ asset('front-assets/images/icons/arrow-2.svg') }}"
                                                    width="16" height="20" alt="Arrow"></span>
                                        </button>
                                    </a>
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
                <!-- Left Part End -->

                <!-- Right Part Start -->
                <div class="col-lg-4 col-xl-3">
                    <!-- Google search input Start -->

                    <!-- Google search input End -->

                    <!-- Popular snippets start -->
                    <div class="each-side-bar-post-div mb-3">
                        <h4 class="heading">Popular Snippets</h4>
                        <ul>
                            @foreach ($popular_snipits as $item)
                                <li @if (strpos($item->canonical_tag, 'preview-snippets') !== false) class="d-none" @endif><a href="{{ url($item->canonical_tag) }}" aria-label="{{ $item->title }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Popular snippets end -->

                    <!-- Tutorial categories start -->
                    <div class="each-side-bar-category-div mb-3">
                        <h4 class="heading">Our Tutorials</h4>
                        <div class="container-fluid px-0">
                            <div class="row">
                                @foreach (our_tutorials() as $item)
                                    <div class="col-6 col-md-3 col-lg-6 px-1 mt-2">
                                        <a href="{{ route('our-tutorials', $item->url_name) }}" aria-label="{{ $item->url_name }}">
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
                </div>
                <!-- Right Part End -->
            </div>
            <!-- Resume start -->
            @include('frontend.layout.inc.resume-banner')
            <!-- Resume end -->
        </div>
    </div>

@endsection
@section('custom-script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Number of cards per page
            const cardsPerPage = 6;
            const posts = document.querySelectorAll('.each-posts-card');
            const totalCards = posts.length;
            const totalPages = Math.ceil(totalCards / cardsPerPage);
            const paginationContainer = document.getElementById('pagination');
            let currentPage = 1;
            const maxVisiblePages = 3;

            // Function to show a specific page of cards
            function showPage(page) {
                // Hide the parent element of all cards
                posts.forEach(post => {
                    post.closest('.each-post-parent').style.display = 'none';
                });

                // Show only the parent elements for the current page
                const start = (page - 1) * cardsPerPage;
                const end = start + cardsPerPage;
                for (let i = start; i < end && i < totalCards; i++) {
                    posts[i].closest('.each-post-parent').style.display = 'block';
                }

                // Update active class for pagination links
                document.querySelectorAll('.page-link').forEach(link => {
                    link.classList.remove('active');
                });

                const activePageLink = document.querySelector(`.page-link[data-page="${page}"]`);
                if (activePageLink) {
                    activePageLink.classList.add('active');
                }
            }

            // Function to create pagination controls (with Next, Previous, and max 5 page links)
            function createPagination() {
                paginationContainer.innerHTML = ''; // Clear existing pagination

                // Create Previous Button
                const previousBtn = document.createElement('button');
                previousBtn.textContent = '«';
                previousBtn.classList.add('page-link');
                previousBtn.addEventListener('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                        updatePagination();
                    }
                });
                paginationContainer.appendChild(previousBtn);

                // Create Next Button
                const nextBtn = document.createElement('button');
                nextBtn.textContent = '»';
                nextBtn.classList.add('page-link');
                nextBtn.addEventListener('click', function() {
                    if (currentPage < totalPages) {
                        currentPage++;
                        showPage(currentPage);
                        updatePagination();
                    }
                });
                paginationContainer.appendChild(nextBtn);

                updatePagination();
            }

            // Function to update pagination links
            function updatePagination() {
                const startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                const endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                // Remove existing number buttons
                const paginationNumbers = paginationContainer.querySelectorAll('.page-num');
                paginationNumbers.forEach(pageNum => pageNum.remove());

                // Add page number buttons
                for (let i = startPage; i <= endPage; i++) {
                    const pageLink = document.createElement('a');
                    pageLink.setAttribute("href", "#button-focused");;
                    pageLink.classList.add('page-link', 'page-num');
                    pageLink.textContent = i;
                    pageLink.setAttribute('data-page', i);
                    pageLink.addEventListener('click', function() {
                        currentPage = parseInt(this.getAttribute('data-page'));
                        showPage(currentPage);
                        updatePagination();
                    });
                    paginationContainer.insertBefore(pageLink, paginationContainer
                        .lastChild); // Insert before Next button
                }

                // Disable Previous and Next buttons when necessary
                paginationContainer.querySelector('button.page-link:nth-child(1)').disabled = currentPage === 1;
                paginationContainer.querySelector('button.page-link:nth-last-child(1)').disabled = currentPage ===
                    totalPages;

                // Highlight the current active page
                showPage(currentPage);
            }

            // Initialize the pagination and show the first page
            createPagination();
            showPage(1);
        });
    </script>
@endsection
