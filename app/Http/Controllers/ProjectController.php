<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Project;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

// namespace Intervention\Image\Facades;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::orderBy('id', 'DESC')->get();
        // dd($projects);
        return view('admin.pages.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertystatus = PropertyStatus::where('status',1)->get();
        $type = PropertyType::where('status',1)->get();
        $location = Location::where('status',1)->get();
//  dd($status);
        return view('admin.pages.project.create', compact('propertystatus','type','location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'location' => 'nullable',
            'apartment_size' => 'nullable',
            'bedroom' => 'nullable|numeric',
            'completion_date' => 'nullable',
            'propertystatus' => 'nullable',
            'propertytype' => 'nullable',
            'experience' => 'nullable',
            'features' => 'nullable',
            'brochure' => 'nullable|mimes:pdf',
            'floor_plan' => 'nullable',
            'image' => 'required|image|max:2048', // max file size of 2MB
            'thumbnail' => 'required|image|max:2048', // max file size of 2MB
        ]);
        //  dd($data);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(1120, 550); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('png', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/projects/') . $imageName);
            $data['image'] = $imageName;
        }
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(300, 300); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('png', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/projects/') . $imageName);
            $data['thumbnail'] = $imageName;
        }
        if ($request->hasFile('brochure')) {

            $file = $request->file('brochure');
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects/'), $fileName);
            $data['brochure'] = $fileName;
        }
        // dd($data);
        $project = Project::create($data);

        if ($project) {
            return redirect()->route('projects.index')->with('success', 'Project created successfully.');
            # code...
        } else {
            return back()->with('error', 'Project creating showing error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.pages.project.view', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $propertystatus = PropertyStatus::where('status',1)->get();
        $type = PropertyType::where('status',1)->get();
        $location = Location::where('status',1)->get();

        return view('admin.pages.project.edit', compact('project','propertystatus','type','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'location' => 'nullable',
            'apartment_size' => 'nullable',
            'bedroom' => 'nullable|numeric',
            'completion_date' => 'nullable',
            'propertystatus' => 'nullable',
            'propertytype' => 'nullable',
            'experience' => 'nullable',
            'features' => 'nullable',

            'floor_plan' => 'nullable',

        ]);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(300, 300); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('png', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/projects/') . $imageName);
            $data['thumbnail'] = $imageName;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            $img = Image::make($image->path());
            $img->fit(1120, 550); // resize the image to fit within 380x310 while preserving aspect ratio
            $img->encode('png', 80); // convert image to JPEG format with 80% quality and reduce file size to 80kb
            $img->save(base_path('/uploads/projects/') . $imageName);
            $data['image'] = $imageName;
        }
        if ($request->hasFile('brochure')) {
            // $data = $request->validate([
            //     'brochure' => 'nullable|mimes:pdf',
            // ]);
            $file = $request->file('brochure');
            //
            $fileName = time() . '_file.' . $file->getClientOriginalExtension();
            $file->move(base_path('uploads/projects/'), $fileName);

            $data['brochure'] = $fileName;
        }
        $project = $project->update($data);



        if ($project) {
            return redirect()->route('projects.index')->with('success', 'Project Updated successfully.');
            # code...
        } else {
            return back()->with('error', 'Project Update showing error.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // delete the project's image file, if it exists

        if ($project->image && file_exists(asset('uploads/projects/' . $project->image))) {
            unlink(asset('uploads/projects/' . $project->image));
        }

        // delete the project from the database
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }



    /**
     * Active the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function Active(Project $project)
    {

        $project->status = '1';
        if ($project->save()) {
            return redirect()->route('projects.index')->with('success', 'project Activated successfully.');
        } else {
            return back()->with('error', 'project Activation Unsuccessfull');
        }
    }
    /**
     * Inactive  the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function Inactive(Project $project)

    {
        // dd($project->status);
        $project->status = '0';
        if ($project->save()) {
            return redirect()->route('projects.index')->with('success', 'project Deactivated successfully.');
        } else {
            return back()->with('error', 'project Dactivation Unsuccessfull.');
        }
    }
}
