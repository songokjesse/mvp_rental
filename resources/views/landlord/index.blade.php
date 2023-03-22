@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('LandLords') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="d-grid gap-2 d-md-flex mb-3 mt-2 justify-content-md-end">
                            <a href="{{route('landlords.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i> New</a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($landlords as $landlord)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$landlord->name}}</td>
                                    <td>{{$landlord->email}}</td>
                                    <td>{{$landlord->phone}}</td>
                                    <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="mt-2">
                                {{ $landlords->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
