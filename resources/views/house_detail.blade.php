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
    <main class="py-4 container" >
        <div class="px-4 pt-2 text-center border-bottom" >
            <h1 class="display-4 fw-bold">Eldoret Rentals</h1>
        </div>
    <div class="row mt-3">
        <div class="col-md-8">
            @if($images->isEmpty())
                <img src="https://placehold.co/400x200/grey/white" class="d-block w-100" alt="{{ $house->name }}">
            @else
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($images as $key => $image)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
{{--                         <img src="{{ asset($image->name) ?? 'https://res.cloudinary.com/homework-support-com/image/upload/v1681149100/cvlpgqqdolmqkupixmhh.jpg' }}" class="d-block w-100" alt="{{ $house->name }}">--}}
                                <img src="https://res.cloudinary.com/homework-support-com/image/upload/v1681149100/cvlpgqqdolmqkupixmhh.jpg" class="d-block w-100" alt="{{ $house->name }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif

        </div>
        <div class="col-md-4">
            <h3>Property Details</h3>
            <ul class="list-group">
            <li class="list-group-item"> <strong>Location:</strong> {{ $house->location_name }} </li>
            <li class="list-group-item"> <strong>Property Type:</strong> {{ $house->category_name }} </li>
            <li class="list-group-item"> <strong>Price:</strong> Ksh {{ $house->price }} </li>
            </ul>
            <div class="mt-4">
                <h3>Landlord/Agent Details</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Name:</strong> {{ $house->landlord_name }} </li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $house->landlord_email }}</li>
                    <li class="list-group-item"><strong>Phone:</strong> {{ $house->landlord_phone}}</li>
                </ul>
            </div>
            <div class="mt-4">
                <h3>Amenities</h3>
                <ul class="list-group">
                    @foreach($utilities as  $utility)
                    <li class="list-group-item">{{$utility->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
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

