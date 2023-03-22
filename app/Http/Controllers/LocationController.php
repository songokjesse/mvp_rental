<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $locations = Location::paginate(10);
        return view('location.index',compact('locations'));
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('location.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:locations',
        ]);
        Location::create($request->all());
        return redirect()->route('locations.index')
            ->with('success','Location created successfully.');
    }

    public function delete($id)
    {
    }
}
