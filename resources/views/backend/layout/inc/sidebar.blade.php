@php
    $routeName = Route::currentRouteName();
    $articleOpen = in_array($routeName, ['articles', 'draft_articles', 'create-article', 'save-article', 'article-comments', 'article-comment'], true);
    $jobOpen = in_array($routeName, ['courses-category', 'courses', 'draft_courses', 'create-course', 'save-course', 'add-course-category', 'course-category-edit'], true);
    $sitemapOpen = in_array($routeName, ['sitemap-urls', 'create-sitemap', 'edit-sitemap'], true);
@endphp

<aside class="rs-sidebar sidebar-offcanvas" id="sidebar">
    <div class="rs-sidebar-inner">
        <nav class="rs-nav">
            <p class="rs-nav-label">Overview</p>
            <a class="rs-nav-item {{ $routeName === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="ti-dashboard"></i><span>Dashboard</span>
            </a>
            <p class="rs-nav-label">Content</p>
            <button class="rs-nav-item rs-nav-toggle collapsed {{ $articleOpen ? 'active' : '' }}" type="button" data-toggle="collapse" data-target="#rsArticleMenu" aria-expanded="{{ $articleOpen ? 'true' : 'false' }}">
                <i class="ti-write"></i><span>Articles</span><b class="ti-angle-down"></b>
            </button>
            <div class="collapse rs-nav-sub {{ $articleOpen ? 'show' : '' }}" id="rsArticleMenu">
                <a href="{{ route('articles') }}">Article List</a>
                <a href="{{ route('article-comments') }}">Comments</a>
            </div>

            <button class="rs-nav-item rs-nav-toggle collapsed {{ $jobOpen ? 'active' : '' }}" type="button" data-toggle="collapse" data-target="#rsJobMenu" aria-expanded="{{ $jobOpen ? 'true' : 'false' }}">
                <i class="ti-briefcase"></i><span>Jobs</span><b class="ti-angle-down"></b>
            </button>
            <div class="collapse rs-nav-sub {{ $jobOpen ? 'show' : '' }}" id="rsJobMenu">
                <a href="{{ route('courses-category') }}">Categories</a>
                <a href="{{ route('courses') }}">Job List</a>
            </div>

            <p class="rs-nav-label">System</p>
            <a class="rs-nav-item {{ $sitemapOpen ? 'active' : '' }}" href="{{ route('sitemap-urls') }}">
                <i class="ti-map-alt"></i><span>Extra Sitemap URLs</span>
            </a>
            <a class="rs-nav-item {{ $routeName === 'subscribers' ? 'active' : '' }}" href="{{ route('subscribers') }}">
                <i class="ti-user"></i><span>Subscribers</span>
            </a>
            <a class="rs-nav-item {{ $routeName === 'contactus' ? 'active' : '' }}" href="{{ route('contactus') }}">
                <i class="ti-email"></i><span>Contact US</span>
            </a>
        </nav>

        <a class="rs-logout" href="{{ route('logout') }}">
            <i class="ti-power-off"></i><span>Logout</span>
        </a>
    </div>
</aside>
