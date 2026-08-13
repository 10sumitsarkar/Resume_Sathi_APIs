@php
    $title = $article->meta_title ?: ($article->article_title ?: 'Blog Article');
    $description = $article->meta_description ?: 'Read this helpful article from ResumeSathi.';
    $keywords = $article->meta_keyword ?: 'resume tips, career advice, job search';
    $category = optional($article->category)->article_name ?: 'Career Advice';
    $content = $article->contents->pluck('content')->filter()->implode("\n");
@endphp

@extends('frontend.layout.master')

@section('title', $title)
@section('description', $description)
@section('keywords', $keywords)
@section('canonical', $canonical)
@section('og-title', $title . ' | ResumeSathi')
@section('og-description', $description)
@section('og-url', $canonical)
@section('og-type', 'article')
@section('og-image', $image)

@section('custom-css')
<style>
    .rs-dynamic-page { padding: 40px 0; background: #f8fafc; }
    .rs-dynamic-wrap { max-width: 1180px; margin: 0 auto; padding: 0 16px; }
    .rs-dynamic-hero { display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(280px, .8fr); gap: 28px; align-items: center; margin-bottom: 28px; }
    .rs-dynamic-eyebrow { display: inline-block; font-weight: 700; color: #0f766e; margin-bottom: 12px; }
    .rs-dynamic-hero h1 { font-size: clamp(30px, 4vw, 52px); line-height: 1.08; margin: 0 0 14px; color: #111827; }
    .rs-dynamic-meta { color: #64748b; font-size: 15px; }
    .rs-dynamic-hero img { width: 100%; border-radius: 8px; object-fit: cover; aspect-ratio: 16 / 9; background: #e5e7eb; }
    .rs-dynamic-grid { display: grid; grid-template-columns: minmax(0, 1fr) 300px; gap: 28px; align-items: start; }
    .rs-dynamic-content, .rs-dynamic-sidebar { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 24px; }
    .rs-dynamic-content :is(h2,h3) { margin-top: 28px; color: #111827; }
    .rs-dynamic-content table { width: 100%; border-collapse: collapse; margin: 16px 0; }
    .rs-dynamic-content :is(td,th) { border: 1px solid #d1d5db; padding: 10px; vertical-align: top; }
    .rs-dynamic-content img { max-width: 100%; height: auto; }
    .rs-dynamic-sidebar a { display: block; color: #111827; font-weight: 600; margin-bottom: 14px; }
    @media (max-width: 900px) { .rs-dynamic-hero, .rs-dynamic-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
@php
    $articleSchema = [
        '@' . 'context' => 'https://schema.org',
        '@' . 'type' => 'Article',
        'headline' => $title,
        'description' => $description,
        'image' => $image,
        'datePublished' => optional($article->created_at)->toAtomString(),
        'dateModified' => optional($article->updated_at)->toAtomString(),
        'mainEntityOfPage' => $canonical,
        'author' => [
            '@' . 'type' => 'Person',
            'name' => trim(optional($article->user)->first_name . ' ' . optional($article->user)->last_name) ?: 'ResumeSathi',
        ],
        'publisher' => [
            '@' . 'type' => 'Organization',
            'name' => 'ResumeSathi',
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($articleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

<main class="rs-dynamic-page">
    <div class="rs-dynamic-wrap">
        <section class="rs-dynamic-hero">
            <div>
                <span class="rs-dynamic-eyebrow">{{ $category }}</span>
                <h1>{{ $article->article_title ?: $title }}</h1>
                <div class="rs-dynamic-meta">{{ optional($article->created_at)->format('d M Y') }} · ResumeSathi</div>
            </div>
            <img src="{{ $image }}" alt="{{ $article->article_title ?: $title }}">
        </section>

        <section class="rs-dynamic-grid">
            <article class="rs-dynamic-content">
                {!! $content ?: '<p>Article content is not available right now.</p>' !!}
            </article>
            <aside class="rs-dynamic-sidebar">
                <h3>Latest Articles</h3>
                @foreach ($latest as $item)
                    @php $slug = \Illuminate\Support\Str::slug(collect(explode('/', $item->url_name ?: $item->canonical_tag))->filter()->last()); @endphp
                    <a href="{{ url('/blog/' . $slug . '/') }}">{{ $item->article_title ?: $item->meta_title }}</a>
                @endforeach
            </aside>
        </section>
    </div>
</main>
@endsection
