@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Houses') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mt-2 mb-2">
                            <a class="btn btn-warning btn-sm" href="{{route('houses.index')}}"><i class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>

                            <div class="mt-2">
                                <h4>Fill House Details</h4>
                            </div>
                        <hr>

                        <form method="POST" action="{{ route('houses.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('House Name') }}</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-md-2 col-form-label text-md-end">{{ __('House Price') }}</label>
                                <div class="col-md-8">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="house_type" class="col-md-2 col-form-label text-md-end">{{ __('House Type') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autofocus>
                                        <option selected disabled> -- Select House Type -- </option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="location" class="col-md-2 col-form-label text-md-end">{{ __('Estate/Location') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control @error('location_id') is-invalid @enderror" name="location_id" value="{{ old('location_id') }}" required autofocus>
                                        <option selected disabled> -- Select House Location / Estate -- </option>
                                        @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="location" class="col-md-2 col-form-label text-md-end">{{ __('Landlord/Agent') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control @error('landlord_id') is-invalid @enderror" name="landlord_id" value="{{ old('landlord_id') }}" required autofocus>
                                        <option selected disabled> -- Select Landlord/Agent -- </option>
                                        @foreach($landlords as $landlord)
                                        <option value="{{$landlord->id}}">{{$landlord->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('landlord_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3">
                                <h4>Select Available Utilities</h4>
                            </div>

                            <hr class="mt-2 mb-2">

                            <div>
                                @foreach($utilities as $utility)
                                <div class="form-check">
                                    <input class="form-check-input" name="utilities[]" type="checkbox" value="{{$utility->id}}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$utility->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <hr class="mt-2 mb-2">


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-8">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
