<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\House;
use App\Models\Landlord;
use App\Models\Location;
use App\Models\Utility;
use Carbon\Carbon;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::with('landlord','category', 'location')->paginate(20);
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
       $request->validate([
           'name' => 'required',
           'price' => 'required',
           'location_id' => 'required',
           'category_id' => 'required',
           'landlord_id' => 'required',
       ]);

       $house = new House;
       $house->name = $request->name;
       $house->price = $request->price;
       $house->category_id = $request->category_id;
       $house->location_id = $request->location_id;
       $house->landlord_id = $request->landlord_id;
       $house->save();

       $house_utilities = $request['utilities'];

       foreach ($house_utilities as $utility){
          DB::table('houses_utilities')->insert([
              'house_id' => $house->id,
              'utility_id' => $utility,
              "created_at" =>  Carbon::now(), # new \Datetime()
              "updated_at" => Carbon::now(),  # new \Datetime()
          ]);
       }

       return redirect()->route('houses.index')->with('success', 'House Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $houses = DB::table('houses')
            ->join('locations', 'houses.location_id', '=', 'locations.id')
            ->join('categories', 'houses.category_id', '=', 'categories.id')
            ->select(
                'houses.id',
                'houses.name',
                'houses.price',
                'houses.landlord_id',
                'locations.name as location_name',
                'categories.name as category_name',
            )
            ->where('houses.id', '=', $id)
            ->first();
        $landlord = DB::table('landlords')
            ->join('users', 'landlords.user_id', '=', 'users.id')
            ->where('landlords.id', '=', $houses->landlord_id)
            ->select('landlords.phone', 'users.name', 'users.email')
            ->first();
        $utilities = DB::table('utilities')
            ->join('houses_utilities', 'utilities.id', '=', 'houses_utilities.utility_id')
            ->where('houses_utilities.house_id', '=', $id)
            ->select('utilities.name')
            ->get();
        return view('house.show', compact('houses', 'utilities','landlord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        $locations = Location::all();
        $categories = Categories::all();
        $landlords = Landlord::all();
        $utilities = Utility::all();

        return view('house.edit', [
            'house' => $house,
            'locations' => $locations,
            'categories' => $categories,
            'landlords' => $landlords,
            'utilities' => $utilities
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'location_id' => 'required|exists:locations,id',
            'category_id' => 'required|exists:categories,id',
            'landlord_id' => 'required|exists:landlords,id',
        ], [
            'name.required' => 'The title field is required.',
            'name.max' => 'The title field may not be greater than 255 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'location_id.required' => 'The location field is required.',
            'location_id.exists' => 'The selected location is invalid.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'landlord_id.required' => 'The Landlord field is required.',
            'landlord_id.exists' => 'The selected Landlord is invalid.',
        ]);

        $house->update($request->only([
            'name',
            'price',
            'location_id',
            'category_id',
            'landlord_id',
        ]));

        $house->name = $request->input('name');
        $house->price = $request->input('price');

        // Update the property's location and category
        $house->location_id = $request->input('location_id');
        $house->category_id = $request->input('category_id');
        $house->landlord_id = $request->input('landlord_id');

        $house->save();

        // Update the property's utilities
        $utilities = $request->input('utilities', []);
        $house->utilities()->sync($utilities);


        return redirect()->route('houses.show', $house->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
