@php
    $title = $job->meta_title ?: ($job->title ?: $job->topic_name);
    $description = $job->meta_description ?: ($job->description ?: 'Explore this job opportunity on ResumeSathi.');
    $keywords = $job->meta_keyword ?: 'jobs, government jobs, career opportunities';
    $category = optional($job->course_category)->course_name ?: 'Jobs';
    $content = $job->contents->pluck('content')->filter()->implode("\n");
    $validThrough = $job->last_date_for_apply ? \Carbon\Carbon::parse($job->last_date_for_apply)->toDateString() : null;
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
    .rs-dynamic-eyebrow { display: inline-block; font-weight: 700; color: #b45309; margin-bottom: 12px; }
    .rs-dynamic-hero h1 { font-size: clamp(30px, 4vw, 52px); line-height: 1.08; margin: 0 0 14px; color: #111827; }
    .rs-dynamic-meta { display: flex; flex-wrap: wrap; gap: 10px; color: #475569; font-size: 15px; }
    .rs-dynamic-pill { background: #fff; border: 1px solid #e5e7eb; border-radius: 999px; padding: 7px 12px; }
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
    $jobSchema = [
        '@' . 'context' => 'https://schema.org/',
        '@' . 'type' => 'JobPosting',
        'title' => $job->title ?: $job->topic_name,
        'description' => $content ?: $description,
        'image' => $image,
        'datePosted' => optional($job->created_at)->toDateString(),
        'validThrough' => $validThrough,
        'employmentType' => $job->employment_type ?: 'FULL_TIME',
        'industry' => $category,
        'identifier' => [
            '@' . 'type' => 'PropertyValue',
            'name' => 'ResumeSathi',
            'value' => (string) $job->id,
        ],
        'hiringOrganization' => [
            '@' . 'type' => 'Organization',
            'name' => $job->company ?: ($category . ' - Government Jobs'),
            'sameAs' => url('/jobs/'),
        ],
        'jobLocation' => [
            '@' . 'type' => 'Place',
            'address' => [
                '@' . 'type' => 'PostalAddress',
                'addressLocality' => $job->location,
                'addressCountry' => 'IN',
            ],
        ],
        'directApply' => false,
    ];
@endphp
<script type="application/ld+json">
{!! json_encode(array_filter($jobSchema, fn ($value) => $value !== null && $value !== ''), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

<main class="rs-dynamic-page">
    <div class="rs-dynamic-wrap">
        <section class="rs-dynamic-hero">
            <div>
                <span class="rs-dynamic-eyebrow">{{ $category }}</span>
                <h1>{{ $job->title ?: $job->topic_name }}</h1>
                <div class="rs-dynamic-meta">
                    @if($job->application_begin)<span class="rs-dynamic-pill">Apply From: {{ \Carbon\Carbon::parse($job->application_begin)->format('d M Y') }}</span>@endif
                    @if($job->last_date_for_apply)<span class="rs-dynamic-pill">Last Date: {{ \Carbon\Carbon::parse($job->last_date_for_apply)->format('d M Y') }}</span>@endif
                    @if($job->location)<span class="rs-dynamic-pill">{{ $job->location }}</span>@endif
                </div>
            </div>
            <img src="{{ $image }}" alt="{{ $job->title ?: $category }}">
        </section>

        <section class="rs-dynamic-grid">
            <article class="rs-dynamic-content">
                {!! $content ?: '<p>Job details are not available right now.</p>' !!}
            </article>
            <aside class="rs-dynamic-sidebar">
                <h3>Latest Jobs</h3>
                @foreach ($latest as $item)
                    @php $slug = \Illuminate\Support\Str::slug(collect(explode('/', $item->url_name ?: $item->canonical_tag))->filter()->last()); @endphp
                    <a href="{{ url('/jobs/' . $slug . '/') }}">{{ $item->title ?: $item->topic_name }}</a>
                @endforeach
            </aside>
        </section>
    </div>
</main>
@endsection
