<div class="col-lg-4 col-xl-3">
    <!-- Google search input Start -->
    <div class="right_search_input">
        @include('frontend.layout.inc.sidebar-components.search-adsense')
    </div>
    <!-- Google search input End -->

    <!-- Popular movies start -->
    <div class="each-side-bar-post-div mb-3">
        <h4 class="heading">Popular Movies</h4>
        <div class="sidebar-movie-list">
            @foreach ($popular as $item)
                <div>
                    <a href="{{ url($item->canonical_tag) }}">
                        <img src="{{ url($item->hero_image) }}" class="img-fluid" alt="Popular Movies">
                    </a>
                </div>
            @endforeach

        </div>
        <a href="{{ route('all-movies') }}" class="view-all-movies-btn mt-2">
            View All
            <span><img src="{{ asset('front-assets/images/icons/arrow-2.svg') }}" width="16" height="20"
                    alt="Arrow"></span>
        </a>
    </div>
    <!-- Popular movies end -->

    <!-- Upcoming movies start -->
    @if (count($upcoming))
        <div class="each-side-bar-post-div mb-3">
            <h4 class="heading">Upcomming Movies</h4>
            <div class="right_side_userList_div p-2">
                <div class="sidebar-movie-list">
                    @foreach ($upcoming as $item)
                        <div>
                            <a href="{{ url($item->canonical_tag) }}">
                                <img src="{{ url($item->hero_image) }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('all-movies') }}" class="view-all-movies-btn mt-2">
                    View All
                    <span><img src="{{ asset('front-assets/images/icons/arrow-2.svg') }}" width="16" height="20"
                            alt="Arrow"></span>
                </a>
            </div>
        </div>
    @endif
    <!-- Upcoming movies end -->

    {{-- Movies categories start --}}
    <div class="each-side-bar-category-div mb-3">
        <h4 class="heading">Related Categories</h4>
        <div class="container-fluid px-0">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-6 col-md-3 col-lg-6 px-1 mt-2">
                        <a href="{{ route('all-movies', $category->url_name) }}">
                            <h5 class="each-category">
                                {{ $category->name }}
                            </h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Movies categories end --}}

</div>
