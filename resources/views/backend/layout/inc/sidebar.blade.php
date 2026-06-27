<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('article-analytics') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Analytics</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#article-elements" aria-expanded="false" aria-controls="article-elements">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Articles</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="article-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('articles') }}">Article List</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('draft_articles') }}">Draft Article</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('create-article') }}">Add Article</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('tutorials') }}">Tutorials</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('article-comments') }}">Comments</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#course-elements" aria-expanded="false" aria-controls="course-elements">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Course</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="course-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('courses-category') }}">Category</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}">Topics</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('draft_courses') }}">Drafts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('create-course') }}">Add</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#snipit-elements" aria-expanded="false" aria-controls="snipit-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Snipits</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="snipit-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('snipits') }}">Snipit List</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('draft_snipits') }}">Draft Snipits</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('create-snipit') }}">Add Snipit</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('snipit-category') }}">Category</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#html-category" aria-expanded="false" aria-controls="html-category">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Html Symbols</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="html-category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('html-symbols-categories') }}">Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('add-html-symbols-category') }}">Add Category</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('html-symbols') }}">Symbols</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('add-html-symbol') }}">Add Symbol</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#movie-category" aria-expanded="false" aria-controls="movie-category">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Movies</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="movie-category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin-movies') }}">List</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin-movie-create') }}">Create Movie</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('sitemap-urls') }}">
          <i class="icon-map menu-icon"></i>
          <span class="menu-title">Sitemap</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('subscribers') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Subscribers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contactus') }}">
          <i class="icon-mail menu-icon"></i>
          <span class="menu-title">Contact US</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('errors') }}">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Errors</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
