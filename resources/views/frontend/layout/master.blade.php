<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Google Ads Start --}}
    @include('frontend.layout.inc.ads.auto-ads')
    {{-- Google Ads End --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-assets/images/logos/favicon.png') }}">
    <title>@yield('title') | ResumeSathi</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="canonical" href="@yield('canonical')" />

    {{-- OG meta tags start --}}
    <meta property="og:title" content="@yield('og-title')" />
    <meta property="og:description" content="@yield('og-description')" />
    <meta property="og:type" content="@yield('og-type', 'website')" />
    <meta property="og:image" content="@yield('og-image', asset('front-assets/images/logos/og-images.png'))" />
    <meta property="og:url" content="@yield('og-url')" />
    {{-- OG meta tags end --}}

    {{-- Preloded CSS start --}}
    <link rel="preload" as="style" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="preload" as="style" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="preload" as="style" href="{{ asset('front-assets/css/responsive.css') }}">
    {{-- Preloded CSS end --}}

    {{-- Regular CSS Start --}}
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}">
    {{-- Regular CSS End --}}

    {{-- Schema start --}}
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'ResumeSathi',
            'url' => trim($__env->yieldContent('og-url')),
            'description' => trim($__env->yieldContent('description')),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'ResumeSathi',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    {{-- Schema End --}}

    {{-- Google analytics code start --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L3QP8NJR3K"></script>
    <script>
     window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());

     gtag('config', 'G-L3QP8NJR3K');
    </script>
    {{-- Google analytics code end --}}

    @yield('page-css')
    @yield('custom-css')
</head>

<body>
    @include('frontend.layout.inc.header')
    @yield('content')
    @include('frontend.layout.inc.footer')

    @yield('page-js')

    <script defer src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script defer src="{{ asset('front-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('front-assets/js/custom.min.js') }}"></script>

    @yield('custom-script')

</body>

</html>
