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
    {{ svg_spritesheet() }}

    <div class="container">
        <header>
            <h1 class="mt-10 mb-6 text-xl font-bold leading-normal uppercase">
                Items for sale from <a href="https://instagram.com/samrapaport" target="_blank" class="text-gray-600">&#64;samrapaport</a>
            </h1>
        </header>

        <div class="py-6 leading-normal">
            <h3 class="font-bold uppercase text-lg">How it works</h3>
            <p class="mb-6">Things I'm selling or giving away are listed <a href="/bin" class="text-yellow-600 font-bold underline">in the bin</a>.</p>
            <p class="mb-6">If you see something you want, you can claim it by entering your email. Once something's been claimed by you,
            I'll reach out to the email you provided for shipping info and to get the payment via Venmo, Square, etc.</p>

            <a href="/bin" class="block mt-10 w-full py-6 px-8 bg-black text-white font-bold uppercase text-center">Enter Site</a>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
