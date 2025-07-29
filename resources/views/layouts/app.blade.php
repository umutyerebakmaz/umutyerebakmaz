<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>
        @isset($meta)
            {{ $meta->metaTitle }}
        @endisset
    </title>
    <base href="{{ url('/') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@isset($meta){{ $meta->metaDesc }}@endisset">
    <meta name="keywords" content="@isset($meta){{ $meta->keywords }}@endisset">
    <meta name="news_keywords" content="@isset($meta){{ $meta->keywords }}@endisset">
    <meta name="author" content="@isset($meta){{ $meta->author }}"@endisset/>
    <meta itemprop="author"
        content="@isset($meta){{ $meta->author }}"@endisset/>
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta property="og:type" content="website" />
    <link rel="shortcut icon" href="{{ url('/images/icons/favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icons/favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="body">
    <x-banners.banner></x-banners.banner>
    <x-navigation.navigation></x-navigation.navigation>
    <div class="content">
        @yield('content')
    </div>
    <x-footer></x-footer>
    <x-notifications.simple />
    <x-banners.cookie-banner></x-banners.cookie-banner>
</body>

</html>
