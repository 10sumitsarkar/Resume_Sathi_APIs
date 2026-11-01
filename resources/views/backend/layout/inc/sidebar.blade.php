@php
    $routeName = Route::currentRouteName();
    $articleOpen = in_array($routeName, ['articles', 'draft_articles', 'create-article', 'save-article', 'article-comments', 'article-comment'], true);
    $examGuideOpen = is_string($routeName) && (str_starts_with($routeName, 'exam-guides.') || $routeName === 'exam-guide-comments' || $routeName === 'exam-guide-comment-delete');
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
                <a href="{{ route('create-article') }}">Add Article</a>
                <a href="{{ route('articles') }}">Article List</a>
                <a href="{{ route('draft_articles') }}">Drafts</a>
                <a href="{{ route('article-comments') }}">Comments</a>
            </div>

            <button class="rs-nav-item rs-nav-toggle collapsed {{ $examGuideOpen ? 'active' : '' }}" type="button" data-toggle="collapse" data-target="#rsExamGuideMenu" aria-expanded="{{ $examGuideOpen ? 'true' : 'false' }}">
                <i class="ti-book"></i><span>Exam Guides</span><b class="ti-angle-down"></b>
            </button>
            <div class="collapse rs-nav-sub {{ $examGuideOpen ? 'show' : '' }}" id="rsExamGuideMenu">
                <a href="{{ route('exam-guides.create') }}">Add Exam Guide</a>
                <a href="{{ route('exam-guides.index') }}">Guide List</a>
                <a href="{{ route('exam-guides.drafts') }}">Drafts</a>
                <a href="{{ route('exam-guide-comments') }}">Comments</a>
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
