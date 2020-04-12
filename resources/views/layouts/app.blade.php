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
</head>
<body class="bg-gray-100 antialiased leading-none">
    <div class="py-6 px-4 font-bold text-xl text-center text-white uppercase bg-black">
        {{ config('app.name', 'Bin') }}
    </div>

    <div class="container">
        @yield('content')
    </div>

    <footer class="mt-6 py-6 bg-black text-white text-center">
        populated by <a href="https://instagram.com/samrapaport" target="_blank">&#64;samrapaport</a>
    </footer>
</body>
</html>
