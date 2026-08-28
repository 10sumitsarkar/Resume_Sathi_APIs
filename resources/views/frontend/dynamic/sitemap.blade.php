<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($staticUrls as $item)
    <url>
        <loc>{{ $item['loc'] }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>{{ $item['changefreq'] }}</changefreq>
        <priority>{{ $item['priority'] }}</priority>
    </url>
@endforeach
@foreach ($customUrls as $item)
    @php
        $path = trim((string) $item->slug);
        $loc = \Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])
            ? $path
            : $baseUrl . '/' . trim($path, '/') . '/';
    @endphp
    @if ($path)
    <url>
        <loc>{{ $loc }}</loc>
        <lastmod>{{ ($item->updated_at ?: $item->created_at ?: now())->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>{{ $item->priority ?: '0.7' }}</priority>
    </url>
    @endif
@endforeach
@foreach ($articles as $article)
    @php $slug = $slugger($article); @endphp
    @if ($slug)
    <url>
        <loc>{{ $baseUrl }}/blog/{{ $slug }}/</loc>
        <lastmod>{{ ($article->updated_at ?: $article->created_at)->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endif
@endforeach
@foreach ($jobs as $job)
    @php $slug = $slugger($job); @endphp
    @if ($slug)
    <url>
        <loc>{{ $baseUrl }}/jobs/{{ $slug }}/</loc>
        <lastmod>{{ ($job->updated_at ?: $job->created_at)->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    @endif
@endforeach
</urlset>
