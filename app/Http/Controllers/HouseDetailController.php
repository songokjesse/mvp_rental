<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseDetailController extends Controller
{
    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $house = DB::table('houses')
            ->join('locations', 'houses.location_id', '=', 'locations.id')
            ->join('categories', 'houses.category_id', '=', 'categories.id')
            ->join('landlords', 'houses.landlord_id', '=', 'landlords.id')
            ->select(
                'houses.name',
                'houses.id',
                'houses.landlord_id',
                'locations.name as location_name',
                'categories.name as category_name',
                'houses.price',
                'houses.verified')
            ->where('houses.id', '=', $id)
            ->first();
        $landlord = DB::table('landlords')
            ->join('users', 'landlords.user_id', '=', 'users.id')
            ->where('landlords.id', '=', $house->landlord_id)
            ->select('landlords.phone', 'users.name', 'users.email')
            ->first();
        $utilities = DB::table('houses_utilities')
            ->join('utilities', 'houses_utilities.utility_id', '=','utilities.id' )
            ->where('houses_utilities.house_id', '=', $id)
            ->select('utilities.name')
            ->get();
        $images = DB::table('images')
            ->where('house_id', '=', $id)
            ->get();
        return view('house_detail', compact('house','utilities', 'images', 'landlord'));
    }
}
