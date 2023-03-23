<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\House;
use App\Models\Landlord;
use App\Models\Location;
use App\Models\Utility;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::paginate(20);
        return view('house.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $landlords = Landlord::all();
        $categories = Categories::all();
        $locations = Location::all();
        $utilities = Utility::all();
        return view('house.create', compact('landlords', 'locations', 'categories', 'utilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
