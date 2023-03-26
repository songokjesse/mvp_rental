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
                            <a class="btn btn-warning btn-sm" href="{{route('house_images', $house_id)}}"><i class="bi bi-arrow-left-circle"></i> Back</a>
                        </div>

                        <div class="mt-2">
                            <h4>Upload House Images</h4>
                        </div>
                        <hr class="mb-2">
                            @livewire('house-upload-image')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
