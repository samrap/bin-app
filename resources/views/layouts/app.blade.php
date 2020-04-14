<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BIN') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117994478-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-117994478-2');
    </script>
</head>
<body class="bg-gray-100 antialiased leading-none">
    {{ svg_spritesheet() }}

    <header class="py-6 px-4 font-bold text-xl text-center uppercase border-b">
        <a href="/bin">@icon('box', 'w-6 h-6 fill-current text-gray-600')</a>
    </header>

    <div id="app" class="container">
        @yield('content')
    </div>

    <footer class="mt-6 py-6 bg-black font-bold text-xs text-gray-200 text-center uppercase">
        built &amp; stocked by <a href="https://instagram.com/samrapaport" target="_blank">&#64;samrapaport</a>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
