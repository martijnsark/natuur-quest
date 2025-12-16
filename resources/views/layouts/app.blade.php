<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{ animations: true }" class="flex flex-col min-h-screen font-sans antialiased">
<x-bg-animation x-bind:class="animations ? 'animate-pan' : 'animate-none'"></x-bg-animation>

<!-- Header -->
@isset($header)
    <header role="banner" class="h-[13vh] bg-nav shadow w-full text-white flex items-center">
        <div
            class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center md:gap-x-8">
            {{ $header }}
        </div>
    </header>
@endisset

<!-- Main content -->
<main class="flex-1 w-full" role="main">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="h-[7vh] bg-nav shadow w-full flex items-center justify-center text-white">
    <p>Natuurquest</p>
</footer>

</body>
</html>
