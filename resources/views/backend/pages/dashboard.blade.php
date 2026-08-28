@extends('backend.layout.master')
@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper rs-admin-page">
    <section class="rs-admin-hero">
        <div>
            <span class="rs-kicker">ResumeSathi Admin</span>
            <h1>Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            <p>Manage articles, jobs, sitemap entries, leads, and content health from one focused workspace.</p>
        </div>
    </section>

    <section class="rs-stat-grid">
        <div class="card rs-stat-card">
            <div class="rs-stat-icon"><i class="ti-write"></i></div>
            <div><span>Live Articles</span><strong>{{ number_format($stats['articleCount']) }}</strong><small>{{ number_format($stats['draftArticleCount']) }} drafts</small></div>
        </div>
        <div class="card rs-stat-card rs-stat-deep">
            <div class="rs-stat-icon"><i class="ti-briefcase"></i></div>
            <div><span>Live Jobs</span><strong>{{ number_format($stats['jobCount']) }}</strong><small>{{ number_format($stats['draftJobCount']) }} drafts</small></div>
        </div>
        <div class="card rs-stat-card rs-stat-red-soft">
            <div class="rs-stat-icon"><i class="ti-user"></i></div>
            <div><span>Subscribers</span><strong>{{ number_format($stats['subscriberCount']) }}</strong><small>Audience list</small></div>
        </div>
        <div class="card rs-stat-card rs-stat-brand">
            <div class="rs-stat-icon"><i class="ti-email"></i></div>
            <div><span>Contacts</span><strong>{{ number_format($stats['contactCount']) }}</strong><small>Form leads</small></div>
        </div>
    </section>

    <section class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card rs-panel">
                <div class="rs-panel-head">
                    <div><span class="rs-kicker">Content</span><h2>Latest Articles</h2></div>
                    <a href="{{ route('articles') }}">View all</a>
                </div>
                <div class="rs-list">
                    @forelse ($latestArticles as $article)
                        <a href="{{ route('save-article', base64_encode($article->id)) }}">
                            <span>{{ $article->article_title ?: $article->meta_title ?: 'Untitled article' }}</span>
                            <small>{{ optional($article->updated_at)->format('d M Y') }}</small>
                        </a>
                    @empty
                        <p>No articles added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card rs-panel">
                <div class="rs-panel-head">
                    <div><span class="rs-kicker">Jobs</span><h2>Latest Jobs</h2></div>
                    <a href="{{ route('courses') }}">View all</a>
                </div>
                <div class="rs-list">
                    @forelse ($latestJobs as $job)
                        <a href="{{ route('save-course', base64_encode($job->id)) }}">
                            <span>{{ $job->title ?: $job->topic_name ?: 'Untitled job' }}</span>
                            <small>{{ optional($job->updated_at)->format('d M Y') }}</small>
                        </a>
                    @empty
                        <p>No jobs added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
