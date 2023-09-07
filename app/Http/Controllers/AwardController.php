<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $awards = Award::orderBy('id', 'DESC')->get();
        // dd($awards);
        return view('admin.pages.award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.award.create');
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);


        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(415, 400); // resize the image to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/awards/') . $imageName);
        $data['image'] = $imageName;
        $lastAward = Award::orderByDesc('ranking')->first();
        if ($lastAward) {
            $data['ranking'] = $lastAward->ranking + 1;
        } else {
            $data['ranking'] = 1;
        }

        // Check if the generated slug already exists in the table
        $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $data['title'])));
        $existingSlug = Award::where('slug', $slug)->exists();

        if ($existingSlug) {
            // If the slug exists, add the prefix "c_"
            $slug =  $slug . '_01';
        }
        // dd($slug);
        $data['slug'] = $slug;
        $award = Award::create($data);
        if ($award) {
            return redirect()->route('awards.index')->with('success', 'Award created successfully.');
            # code...
        } else {
            return back()->with('error', 'Award creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        return view('admin.pages.award.view', compact('award'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        return view('admin.pages.award.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'ranking' => 'required',
            'description' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(415, 400); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/awards/') . $imageName);

            $data['image'] = $imageName;
        }

        $slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $data['title'])));
        $existingSlug = Award::where('slug', $slug)->exists();

        if ($existingSlug) {
            // If the slug exists, add the prefix "c_"
            $slug =  $slug . '_01';
        }
        $data['slug'] = $slug;

        $award = $award->update($data);



        if ($award) {
            return redirect()->route('awards.index')->with('success', 'Award Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Award Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        // delete the award's image file, if it exists

        if ($award->image && file_exists(asset('uploads/awards/' . $award->image))) {
            unlink(asset('uploads/awards/' . $award->image));
        }

        // delete the award from the database
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function Active(Award $award)
    {

        $award->status = '1';
        if ($award->save()) {
            return redirect()->route('awards.index')->with('success', 'award Activated successfully.');
        } else {
            return back()->with('error', 'award Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Award $award)

    {
        // dd($award->status);
        $award->status = '0';
        if ($award->save()) {
            return redirect()->route('awards.index')->with('success', 'award Deactivated successfully.');
        } else {
            return back()->with('error', 'award Dactivation Unsuccessfull.');
        }
    }
}
