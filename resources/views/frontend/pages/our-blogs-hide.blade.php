@extends('frontend.layout.master')
@section('title', 'Best of Internet')
@section('description', 'Explore the best of the internet with ResumeSathi. Find insightful articles on technology, coding, web development, and the latest trends in the tech industry. Stay informed with tutorials, programming tips, and in-depth tech blogs.')
@section('keywords', 'Best of Internet, ResumeSathi, Technology Articles, Coding Tutorials, Tech Blogs, Web Development, Learn Coding, Programming Tips, Tech Industry News, HTML CSS JavaScript, Software Development, Digital Innovation, Online Learning, IT Trends, Emerging Technologies')
@section('canonical', 'https://www.ResumeSathi.com/our-blogs')
@section('og-title', 'Best of Internet - ResumeSathi')
@section('og-description', 'Explore the best of the internet with ResumeSathi. Find insightful articles on technology, coding, web development, and the latest trends in the tech industry. Stay informed with tutorials, programming tips, and in-depth tech blogs.')
@section('og-url', 'https://www.ResumeSathi.com/our-blogs')
@section('content')

    @php
        use Illuminate\Support\Carbon;
    @endphp

 <!-- Header Start -->
 <div class="common-container pt-5">
    <h1 class="topics-heading" >Best of <span>Internet</span></h1>
</div>
<!-- Header End -->
<div class="common-container mt-5">
    <div class="container-fluid px-0">
        <div class="row">
            <!-- Left Part Start -->
            <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        @foreach ($articles as $article)
                        <div class="col-sm-6 col-lg-6 col-xl-4 mb-4 each-post-parent">
                            <a href="{{ url($article->canonical_tag) }}" class="each-posts-card" aria-label="{{ $article->article_title }}">
                                <div class="img-div">
                                    <img loading="lazy" src="{{ asset($article->hero_image) }}" class="img-fluid" alt="{{ $article->article_title }}" title="{{ $article->article_title }}">
                                    <div class="post-date-and-view">
                                        <p>
                                            <img loading="lazy" src="{{asset('front-assets/images/icons/post-date.svg')}}" alt="Date" title="Date">
                                            {{ Carbon::parse($article->created_at)->format('d M Y') }}
                                        </p>
                                        <p>
                                            <img loading="lazy" src="{{asset('front-assets/images/icons/post-view.svg')}}" alt="Views" title="Views">
                                            {{ $article->pageview }}
                                        </p>
                                    </div>
                                </div>
                                <h2>{{ $article->article_title }}</h2>
                                <p class="desc-para">{{ $article->meta_description }}</p>
                                <button class="learning-btn">
                                    Read more
                                    <span><img loading="lazy" src="{{asset('front-assets/images/icons/arrow-2.svg')}}" width="16" height="20" alt="Arrow"></span>
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
               <!-- Right Part Start -->
            <div class="col-lg-4 col-xl-3">
                <!-- Google search Start -->
                <div class="right_search_input">
                    @include('frontend.layout.inc.sidebar-components.search-adsense')
                </div>
                <!-- Google search End -->

                <!-- Popular posts start -->
                @include('frontend.layout.inc.sidebar-components.popular-posts')
                <!-- Popular posts end -->

                <!-- Tutorial categories start -->
                @include('frontend.layout.inc.sidebar-components.tutorial-categories')
                <!-- Tutorial categories end -->
            </div>
            <!-- Right Part End -->
            </div>
             <!-- Resume start -->
        @include('frontend.layout.inc.resume-banner')
        <!-- Resume end -->
        </div>
    </section>

@endsection
@section('custom-script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Number of cards per page
        const cardsPerPage = 15;
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
                paginationContainer.insertBefore(pageLink, paginationContainer.lastChild); // Insert before Next button
            }

            // Disable Previous and Next buttons when necessary
            paginationContainer.querySelector('button.page-link:nth-child(1)').disabled = currentPage === 1;
            paginationContainer.querySelector('button.page-link:nth-last-child(1)').disabled = currentPage === totalPages;

            // Highlight the current active page
            showPage(currentPage);
        }

        // Initialize the pagination and show the first page
        createPagination();
        showPage(1);
    });
</script>
@endsection
