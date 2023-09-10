<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $propertytypes = PropertyType::all();
        // dd($propertytypes);
        return view('admin.pages.propertytype.index', compact('propertytypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.propertytype.create');
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

        $propertytype = PropertyType::create($data);

        if ($propertytype) {
            return redirect()->route('propertytypes.index')->with('success', 'PropertyType created successfully.');
            # code...
        } else {
            return back()->with('error', 'PropertyType creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $propertytype)
    {
        return view('admin.pages.propertytype.view', compact('propertytype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyType $propertytype)
    {
        return view('admin.pages.propertytype.edit', compact('propertytype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyType  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyType $propertytype)
    {
        $data = $request->validate([
            'name' => 'nullable',
        ]);


        $propertytype = $propertytype->update($data);



        if ($propertytype) {
            return redirect()->route('propertytypes.index')->with('success', 'PropertyType Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'PropertyType Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyType  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $propertytype)
    {
        // delete the propertytype's image file, if it exists

        // delete the propertytype from the database
        $propertytype->delete();

        return redirect()->route('propertytypes.index')->with('success', 'PropertyType deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyType  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function Active(PropertyType $propertytype)
    {

        $propertytype->status = '1';
        if ($propertytype->save()) {
            return redirect()->route('propertytypes.index')->with('success', 'propertytype Activated successfully.');
        } else {
            return back()->with('error', 'propertytype Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyType  $propertytype
     * @return \Illuminate\Http\Response
     */
    public function Inactive(PropertyType $propertytype)

    {
        // dd($propertytype->status);
        $propertytype->status = '0';
        if ($propertytype->save()) {
            return redirect()->route('propertytypes.index')->with('success', 'propertytype Deactivated successfully.');
        } else {
            return back()->with('error', 'propertytype Dactivation Unsuccessfull.');
        }
    }
}
