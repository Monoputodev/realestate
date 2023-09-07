<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = Client::orderBy('ranking', 'DESC')->get();
        // dd($clients);
        return view('admin.pages.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(public_path());
        return view('admin.pages.client.create');
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
        $img->fit(300, 300);
        $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
        $img->save(base_path('/uploads/clients/') . $imageName);
        $data['image'] = $imageName;
        $lastClient = Client::orderByDesc('ranking')->first();
        if ($lastClient) {
            $data['ranking'] = $lastClient->ranking + 1;
        } else {
            $data['ranking'] = 1;
        }
        $client = Client::create($data);

        if ($client) {
            return redirect()->route('clients.index')->with('success', 'Client created successfully.');
            # code...
        } else {
            return back()->with('error', 'Client creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.pages.client.view', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.pages.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'title' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(300, 300);
            $img->encode('jpg', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/clients/') . $imageName);

            $data['image'] = $imageName;
        }

        $client = $client->update($data);



        if ($client) {
            return redirect()->route('clients.index')->with('success', 'Client Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Client Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // delete the client's image file, if it exists

        if ($client->image && file_exists(asset('uploads/clients/' . $client->image))) {
            unlink(asset('uploads/clients/' . $client->image));
        }

        // delete the client from the database
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function Active(Client $client)
    {

        $client->status = '1';
        if ($client->save()) {
            return redirect()->route('clients.index')->with('success', 'client Activated successfully.');
        } else {
            return back()->with('error', 'client Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Client $client)

    {
        // dd($client->status);
        $client->status = '0';
        if ($client->save()) {
            return redirect()->route('clients.index')->with('success', 'client Deactivated successfully.');
        } else {
            return back()->with('error', 'client Dactivation Unsuccessfull.');
        }
    }
}
