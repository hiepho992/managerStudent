<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Đăng Nhập')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/loginCss.css') }}">
</head>

<body>
    <section class="showcase">
        <div class="video-container">
            <video src="{{ asset('frontend/images/video.mov') }}" autoplay muted loop></video>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </section>
    <script src="{{ asset('frontend/js.js.js') }}"></script>
</body>

</html>
