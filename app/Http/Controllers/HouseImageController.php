<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HouseImageController extends Controller
{
    //
    public function index($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $images = Image::where('house_id', $id)->get();
        $house_id = $id;
        return view('house.images', compact('images', 'house_id'));
    }

    public function upload($id)
    {
        $house_id = $id;
        return view('house.upload', compact('house_id'));
    }
}
