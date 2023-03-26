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

                        <div class="d-grid gap-2 d-md-flex mb-3 mt-2 justify-content-md-end">
                            <a href="{{route('houses.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i> New</a>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Location</th>
{{--                                    <th></th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($houses as $house)
                                <tr>
                                    <td>
                                        <a href="{{route('houses.show', $house->id)}}" class="btn btn-sm btn-outline-dark"> <i class="bi bi-eye"></i> </a>
                                        <a href="{{route('house_images', $house->id)}}" class="btn btn-sm btn-outline-dark"><i class="bi bi-images"></i></a>
                                    </td>
                                    <td>{{$house->name}}</td>
                                    <td>{{$house->category_name}}</td>
                                    <td>Ksh {{$house->price}}</td>
                                    <td>{{$house->location_name}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $houses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
