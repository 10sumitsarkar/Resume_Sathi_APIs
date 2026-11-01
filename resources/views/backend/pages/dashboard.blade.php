@extends('backend.layout.master')
@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper rs-admin-page rs-dashboard-page">
    <section class="rs-admin-hero">
        <div>
            <span class="rs-kicker">ResumeSathi Admin</span>
            <h1>Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            <p>Manage articles, exam guides, sitemap entries, leads, and content health from one focused workspace.</p>
        </div>
        <div class="rs-dashboard-actions">
            <a class="rs-btn-soft" href="{{ route('exam-guides.create') }}"><i class="ti-book"></i> Add Exam Guide</a>
            <a class="rs-btn-primary" href="{{ route('create-article') }}"><i class="ti-write"></i> Create Article</a>
        </div>
    </section>

    <section class="rs-stat-grid">
        <div class="card rs-stat-card rs-dashboard-stat">
            <div class="rs-stat-icon"><i class="ti-write"></i></div>
            <div><span>Live Articles</span><strong>{{ number_format($stats['articleCount']) }}</strong><small>{{ number_format($stats['draftArticleCount']) }} drafts</small></div>
        </div>
        <div class="card rs-stat-card rs-stat-brand rs-dashboard-stat">
            <div class="rs-stat-icon"><i class="ti-book"></i></div>
            <div><span>Live Exam Guides</span><strong>{{ number_format($stats['examGuideCount']) }}</strong><small>{{ number_format($stats['draftExamGuideCount']) }} drafts</small></div>
        </div>
        <div class="card rs-stat-card rs-stat-red-soft rs-dashboard-stat">
            <div class="rs-stat-icon"><i class="ti-user"></i></div>
            <div><span>Subscribers</span><strong>{{ number_format($stats['subscriberCount']) }}</strong><small>Audience list</small></div>
        </div>
        <div class="card rs-stat-card rs-stat-brand rs-dashboard-stat">
            <div class="rs-stat-icon"><i class="ti-email"></i></div>
            <div><span>Contacts</span><strong>{{ number_format($stats['contactCount']) }}</strong><small>Form leads</small></div>
        </div>
    </section>

    <section class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card rs-panel rs-dashboard-panel">
                <div class="rs-panel-head">
                    <div class="rs-dashboard-panel-title">
                        <span class="rs-dashboard-panel-icon"><i class="ti-write"></i></span>
                        <div><span class="rs-kicker">Recently updated</span><h2>Latest Articles</h2></div>
                    </div>
                    <a href="{{ route('articles') }}">View all <i class="ti-arrow-right"></i></a>
                </div>
                <div class="rs-list rs-dashboard-list">
                    @forelse ($latestArticles as $article)
                        <a href="{{ route('save-article', base64_encode($article->id)) }}">
                            <span>{{ $article->article_title ?: $article->meta_title ?: 'Untitled article' }}</span>
                            <small>{{ $article->is_draft ? 'Draft' : optional($article->updated_at)->format('d M Y') }}</small>
                        </a>
                    @empty
                        <p>No articles added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card rs-panel rs-dashboard-panel">
                <div class="rs-panel-head">
                    <div class="rs-dashboard-panel-title">
                        <span class="rs-dashboard-panel-icon"><i class="ti-book"></i></span>
                        <div><span class="rs-kicker">Recently updated</span><h2>Latest Exam Guides</h2></div>
                    </div>
                    <a href="{{ route('exam-guides.index') }}">View all <i class="ti-arrow-right"></i></a>
                </div>
                <div class="rs-list rs-dashboard-list">
                    @forelse ($latestExamGuides as $guide)
                        <a href="{{ route('exam-guides.edit', $guide) }}">
                            <span>{{ $guide->title }}</span>
                            <small>{{ $guide->is_active ? optional($guide->updated_at)->format('d M Y') : 'Draft' }}</small>
                        </a>
                    @empty
                        <p>No exam guides added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card rs-panel rs-dashboard-panel">
                <div class="rs-panel-head">
                    <div class="rs-dashboard-panel-title">
                        <span class="rs-dashboard-panel-icon"><i class="ti-write"></i></span>
                        <div><span class="rs-kicker">{{ number_format($stats['draftArticleCount']) }} drafts</span><h2>Draft Articles</h2></div>
                    </div>
                    <a href="{{ route('draft_articles') }}">View all <i class="ti-arrow-right"></i></a>
                </div>
                <div class="rs-list rs-dashboard-list">
                    @forelse ($latestDraftArticles as $article)
                        <a href="{{ route('save-article', base64_encode($article->id)) }}">
                            <span>{{ $article->article_title ?: $article->meta_title ?: 'Untitled article' }}</span>
                            <small>{{ optional($article->updated_at)->format('d M Y') }}</small>
                        </a>
                    @empty
                        <p>No draft articles.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card rs-panel rs-dashboard-panel">
                <div class="rs-panel-head">
                    <div class="rs-dashboard-panel-title">
                        <span class="rs-dashboard-panel-icon"><i class="ti-book"></i></span>
                        <div><span class="rs-kicker">{{ number_format($stats['draftExamGuideCount']) }} drafts</span><h2>Draft Exam Guides</h2></div>
                    </div>
                    <a href="{{ route('exam-guides.index') }}">Manage guides <i class="ti-arrow-right"></i></a>
                </div>
                <div class="rs-list rs-dashboard-list">
                    @forelse ($latestDraftExamGuides as $guide)
                        <a href="{{ route('exam-guides.edit', $guide) }}">
                            <span>{{ $guide->title ?: 'Untitled exam guide' }}</span>
                            <small>{{ optional($guide->updated_at)->format('d M Y') }}</small>
                        </a>
                    @empty
                        <p>No draft exam guides.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
