<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilities = Utility::paginate(20);
        return view('utility.index', compact('utilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('utility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Utility::create($request->all());
        return redirect()->route('utilities.index')
            ->with('success','Utility created successfully.');
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
