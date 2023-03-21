<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $locations = Location::all();
        return view('location.index',compact('locations'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
    }

    public function delete($id)
    {
    }
}
