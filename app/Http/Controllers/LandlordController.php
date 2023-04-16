<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $landlords = DB::table('landlords')
            ->join('users', 'landlords.user_id', '=', 'users.id')
        ->paginate(20);
        return view('landlord.index', compact('landlords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('landlord.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required',
           'email' => 'required|unique:users|email',
           'password' => ['required', 'string', 'min:8', 'confirmed'],
           'phone' => 'required|unique:landlords',
       ]);

       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password =  Hash::make($request->password);
       $user->save();

       Landlord::create([
           'phone' => $request->phone,
           'user_id' => $user->id,
       ]);

       return redirect()->route('landlords.index')->with('success', 'Landlord created successfully.');
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
