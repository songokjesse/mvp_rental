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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
<div id="app" >
    <main class="py-4" >
        <div class="px-4 pt-2 text-center " >
            <a href="/"><img  src="https://res.cloudinary.com/homework-support-com/image/upload/v1681715670/Eldoret_-Rentals_edjsxj.png" width="500" class="img-fluid"/></a>
{{--            <h1 class="display-4 fw-bold">Eldoret Rentals</h1>--}}
        </div>

        <div class="mt-4">
            @livewire('property-filter')
        </div>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top container">
        <div class="col-md-4 d-flex align-items-center">

            <span class="mb-3 mb-md-0 text-muted">© 2023 Codelab</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-envelope-at"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-instagram"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"></a><i class="bi bi-twitter"></i></li>
        </ul>
    </footer>
</div>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
