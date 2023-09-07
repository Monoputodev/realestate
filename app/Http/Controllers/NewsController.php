<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// namespace Intervention\Image\Facades;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->get();
        // dd($news);
        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.news.create');
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
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048', // max file size of 2MB
        ]);
        // dd($validatedData);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $img = Image::make($image->path());
        $img->fit(720, 530); // resize the image to fit within 380x310 while preserving aspect ratio
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/news/') . $imageName);

        $news = new News();
        $news->title = $validatedData['title'];
        $news->subtitle = $validatedData['subtitle'];
        $news->description = $validatedData['description'];
        $news->image = $imageName;

        if ($news->save()) {
            return redirect()
                ->route('news.index')
                ->with('success', 'News created successfully.');
            # code...
        } else {
            return back()->with('error', 'News creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.pages.news.view', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(380, 310); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/news/') . $imageName);

            $news->image = $imageName;
        }

        $news->title = $validatedData['title'];
        $news->subtitle = $validatedData['subtitle'];
        $news->description = $validatedData['description'];
        $news->save();

        return redirect()
            ->route('news.index')
            ->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // delete the news's image file, if it exists

        if ($news->image && file_exists(asset('uploads/news/' . $news->image))) {
            unlink(asset('uploads/news/' . $news->image));
        }

        // delete the news from the database
        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'News deleted successfully.');
    }

    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function Active(News $news)
    {
        $news->status = '1';
        if ($news->save()) {
            return redirect()
                ->route('news.index')
                ->with('success', 'news Activated successfully.');
        } else {
            return back()->with('error', 'news Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function Inactive(News $news)
    {
        // dd($news->status);
        $news->status = '0';
        if ($news->save()) {
            return redirect()
                ->route('news.index')
                ->with('success', 'news Deactivated successfully.');
        } else {
            return back()->with('error', 'news Dactivation Unsuccessfull.');
        }
    }
}
