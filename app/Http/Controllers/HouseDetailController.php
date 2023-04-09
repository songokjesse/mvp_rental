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
                'locations.name as location_name',
                'categories.name as category_name',
                'landlords.name as landlord_name',
                'landlords.email as landlord_email',
                'landlords.phone as landlord_phone',
                'houses.price',
                'houses.verified')
            ->where('houses.id', '=', $id)
            ->first();
        $utilities = DB::table('houses_utilities')
            ->join('utilities', 'houses_utilities.utility_id', '=','utilities.id' )
            ->where('houses_utilities.house_id', '=', $id)
            ->select('utilities.name')
            ->get();
        $images = DB::table('images')
            ->where('house_id', '=', $id)
            ->get();
//        dd([$house,$utilities,$images]);
        return view('house_detail', compact('house','utilities', 'images'));
    }
}
