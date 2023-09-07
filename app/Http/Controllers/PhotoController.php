<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $photos = Photo::orderBy('ranking', 'DESC')->get();
        // dd($photos);
        return view('admin.pages.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.photo.create');
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
            'title' => 'nullable',
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/photos/') . $imageName);
        $data['image'] = $imageName;
        $lastPhoto = Photo::orderByDesc('ranking')->first();
        if ($lastPhoto) {
            $data['ranking'] = $lastPhoto->ranking + 1;
        } else {
            $data['ranking'] = 1;
        }
        $photo = Photo::create($data);

        if ($photo) {
            return redirect()->route('photos.index')->with('success', 'Photo created successfully.');
            # code...
        } else {
            return back()->with('error', 'Photo creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('admin.pages.photo.view', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('admin.pages.photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $data = $request->validate([
            'title' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/photos/') . $imageName);

            $data['image'] = $imageName;
        }

        $photo = $photo->update($data);



        if ($photo) {
            return redirect()->route('photos.index')->with('success', 'Photo Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Photo Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        // delete the photo's image file, if it exists

        if ($photo->image && file_exists(asset('uploads/photos/' . $photo->image))) {
            unlink(asset('uploads/photos/' . $photo->image));
        }

        // delete the photo from the database
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Photo deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function Active(Photo $photo)
    {

        $photo->status = '1';
        if ($photo->save()) {
            return redirect()->route('photos.index')->with('success', 'photo Activated successfully.');
        } else {
            return back()->with('error', 'photo Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Photo $photo)

    {
        // dd($photo->status);
        $photo->status = '0';
        if ($photo->save()) {
            return redirect()->route('photos.index')->with('success', 'photo Deactivated successfully.');
        } else {
            return back()->with('error', 'photo Dactivation Unsuccessfull.');
        }
    }
}
