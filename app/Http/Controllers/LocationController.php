<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locations = Location::all();
        // dd($locations);
        return view('admin.pages.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $data = $request->validate([
            'name' => 'required',
        ]);

        $location = Location::create($data);

        if ($location) {
            return redirect()->route('locations.index')->with('success', 'Location created successfully.');
            # code...
        } else {
            return back()->with('error', 'Location creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('admin.pages.location.view', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('admin.pages.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'name' => 'nullable',
        ]);


        $location = $location->update($data);



        if ($location) {
            return redirect()->route('locations.index')->with('success', 'Location Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Location Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        // delete the location's image file, if it exists

        // delete the location from the database
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function Active(Location $location)
    {

        $location->status = '1';
        if ($location->save()) {
            return redirect()->route('locations.index')->with('success', 'location Activated successfully.');
        } else {
            return back()->with('error', 'location Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Location $location)

    {
        // dd($location->status);
        $location->status = '0';
        if ($location->save()) {
            return redirect()->route('locations.index')->with('success', 'location Deactivated successfully.');
        } else {
            return back()->with('error', 'location Dactivation Unsuccessfull.');
        }
    }
}
