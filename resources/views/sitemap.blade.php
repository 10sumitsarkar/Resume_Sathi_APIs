<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($customs as $item)
        <url>
            <loc>{{ url($item->slug) }}</loc>
            <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>{{$item->priority}}</priority>
        </url>
    @endforeach
    @foreach ($articles as $article)
        <url>
            <loc>{{ url($article->canonical_tag) }}</loc>
            <lastmod>{{ $article->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($courses as $course)
        <url>
            <loc>{{ url($course->canonical_tag) }}</loc>
            <lastmod>{{ $course->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($snipits as $snipit)
        <url>
            <loc>{{ url($snipit->canonical_tag) }}</loc>
            <lastmod>{{ $snipit->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
    {{-- @foreach ($movies as $movie)
        <url>
            <loc>{{ url($movie->canonical_tag) }}</loc>
            <lastmod>{{ $movie->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach --}}
    @foreach ($symbols as $symbol)
        <url>
            <loc>{{ url($symbol->canonical_tag) }}</loc>
            <lastmod>{{ $symbol->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($tutorials as $item)
        <url>
            <loc>{{ url('our-tutorials/' . $item->url_name) }}</loc>
            <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($snipit_categories as $item)
        <url>
            <loc>{{ url('code-snipits/' . $item->url_name) }}</loc>
            <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <priority>0.8</priority>
        </url>
    @endforeach
    {{-- @foreach ($movie_categories as $item)
    <url>
        <loc>{{ url('movies/' . $item->url_name) }}</loc>
        <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    @endforeach --}}
</urlset>
