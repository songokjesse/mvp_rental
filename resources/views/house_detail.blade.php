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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--                {{ config('app.name', 'Laravel') }}--}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><button class="btn btn-outline-success btn-sm"> {{ __('Login') }}</button></a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><button class="btn btn-outline-success btn-sm">{{ __('Register') }}</button></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 container">
        <div class="px-4 pt-2 text-center">
            <a href="/"><img  src="https://res.cloudinary.com/homework-support-com/image/upload/v1681715670/Eldoret_-Rentals_edjsxj.png"  width="500" class="img-fluid"/></a>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                @if($images->isEmpty())
                    <img src="https://placehold.co/400x200/grey/white" class="d-block w-100" alt="{{ $house->name }}">
                @else
                   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($images as $key => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                        aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $key }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($images as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img
{{--                                        src="https://res.cloudinary.com/homework-support-com/image/upload/v1681148696/ctvdsg71vds0vsku3wwy.jpg" --}}
                                        src="{{asset('storage/'.$image->name )}}"
                                        class="d-block w-100" alt="{{ $house->name }}">

                                         {{--                                        @if($image->name)--}}
{{--                                            src="{{ asset('storage/'.$image->name)}}"--}}
{{--                                        @else--}}
{{--                                            src="https://res.cloudinary.com/homework-support-com/image/upload/v1681148696/ctvdsg71vds0vsku3wwy.jpg"--}}
{{--                                        @endif--}}

                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif

            </div>
            <div class="col-md-4">
                <h3>Property Details</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Location:</strong> {{ $house->location_name }} </li>
                    <li class="list-group-item"><strong>Property Type:</strong> {{ $house->category_name }} </li>
                    <li class="list-group-item"><strong>Price:(PM)</strong> Ksh {{ $house->price }}  </li>
                    <li class="list-group-item"><strong>Deposit:</strong> Ksh {{ $house->price }}  </li>
                </ul>
                <div class="mt-4">
                    <h3>Landlord/Agent Details</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $landlord->name }} </li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $landlord->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $landlord->phone}}</li>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>

