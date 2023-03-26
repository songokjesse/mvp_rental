@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('House Images') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-2 mb-2">
                            <a class="btn btn-warning btn-sm" href="{{route('houses.index')}}"><i class="bi bi-arrow-left-circle"></i> Back</a>
                            <a href="{{route('house_images_upload', $house_id)}}" class="btn btn-success btn-sm"><i class="bi bi-upload"></i> Upload Media</a>
                        </div>

                        <hr class="mt-2 mb-2">

                        @if($images->isEmpty())
                            <h3 class="alert alert-danger">Images/Media Currently Not Available !</h3>
                        @else
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="..." class="d-block w-100 placeholder" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="..." class="d-block w-100 placeholder" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="..." class="d-block w-100 placeholder" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

