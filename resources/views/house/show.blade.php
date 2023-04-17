@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                <div class="mt-2 mb-2">
                <a class="btn btn-warning btn-sm" href="{{route('houses.index')}}"><i class="bi bi-arrow-left-circle"></i> Back</a>
            </div>

            <div class="card">
                    <div class="card-header">{{ __('Houses') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>House Details</h4>
                        <table class="table table-responsive table-primary">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>House Type</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$houses->name}}</td>
                                <td> Ksh {{$houses->price}}</td>
                                <td>{{$houses->category_name}}</td>
                                <td>{{$houses->location_name}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <h4>Landlord/Agent</h4>
                        <table class="table table-responsive table-bordered table-primary">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$landlord->name}}</td>
                                <td>{{$landlord->phone}}</td>
                                <td>{{$landlord->email}}</td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header"> House Utilities </div>
                    <div class="card-body">
                        <ul class="list-group mb-2">
                            @foreach($utilities as $utility)
                                <li class="list-group-item">{{$utility->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
