<?php

namespace App\Http\Controllers;

use App\Models\PropertyStatus;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class PropertyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $propertystatus = PropertyStatus::all();
        // dd($propertystatus);
        return view('admin.pages.propertystatus.index', compact('propertystatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.propertystatus.create');
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

        $propertystatus = PropertyStatus::create($data);

        if ($propertystatus) {
            return redirect()->route('propertystatus.index')->with('success', 'PropertyStatus created successfully.');
            # code...
        } else {
            return back()->with('error', 'PropertyStatus creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyStatus  $propertystatus
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyStatus $propertystatus)
    {
        return view('admin.pages.propertystatus.view', compact('propertystatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyStatus  $propertystatus
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyStatus $propertystatus)
    {
        return view('admin.pages.propertystatus.edit', compact('propertystatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyStatus  $propertystatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyStatus $propertystatus)
    {
        $data = $request->validate([
            'name' => 'nullable',
        ]);


        $propertystatus = $propertystatus->update($data);



        if ($propertystatus) {
            return redirect()->route('propertystatus.index')->with('success', 'PropertyStatus Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'PropertyStatus Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyStatus  $propertystatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyStatus $propertystatus)
    {
        // delete the propertystatus's image file, if it exists

        // delete the propertystatus from the database
        $propertystatus->delete();

        return redirect()->route('propertystatus.index')->with('success', 'PropertyStatus deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyStatus  $propertystatus
     * @return \Illuminate\Http\Response
     */
    public function Active(PropertyStatus $propertystatus)
    {

        $propertystatus->status = '1';
        if ($propertystatus->save()) {
            return redirect()->route('propertystatus.index')->with('success', 'propertystatus Activated successfully.');
        } else {
            return back()->with('error', 'propertystatus Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyStatus  $propertystatus
     * @return \Illuminate\Http\Response
     */
    public function Inactive(PropertyStatus $propertystatus)

    {
        // dd($propertystatus->status);
        $propertystatus->status = '0';
        if ($propertystatus->save()) {
            return redirect()->route('propertystatus.index')->with('success', 'propertystatus Deactivated successfully.');
        } else {
            return back()->with('error', 'propertystatus Dactivation Unsuccessfull.');
        }
    }
}
