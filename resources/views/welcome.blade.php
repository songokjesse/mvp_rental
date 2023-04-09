<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
<div id="app" >
    <main class="py-4" >
        <div class="px-4 pt-2 text-center border-bottom" >
            <h1 class="display-4 fw-bold">Eldoret Market Place</h1>
            <div class="col-lg-6 mx-auto">

            </div>
        </div>

        <div class="mt-3">
            @livewire('property-filter')
        </div>
    </main>
    @livewireScripts
</div>
</body>
</html>
