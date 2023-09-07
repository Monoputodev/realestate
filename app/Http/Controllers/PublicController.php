<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Hero;
use App\Models\Photo;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{



    public function index()
    {

        $photos = Photo::where('status', '1')->orderBy('ranking', 'ASC')->get();
        $clients = Client::where('status', '1')->orderBy('ranking', 'ASC')->get();
        $blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->get();
        $testimonials = Testimonial::where('status', '1')->orderBy('id', 'DESC')->get();
        $heros = Hero::where('status', '1')->orderBy('id', 'DESC')->get();
        $awards = Award::where('status', '1')->orderBy('ranking', 'ASC')->get();
        $projects = Project::orderBy('created_at', 'ASC')->get();
        return view('web.pages.index', compact('awards', 'testimonials', 'blogs', 'heros', 'photos', 'clients', 'projects'));
    }




    public function dashboard()
    {
        if (Auth::user()->role == 1) {
            return redirect()->route('profile.index');
        } else {

            $blogItem = Blog::all();
            // $newsItem = News::all();
            $queries = Contact::all();

            return view('admin.pages.index', compact('queries', 'blogItem'));
        }
    }




    public function blogs()
    {
        // dd($title);
        $blogs = Blog::where('status', '1')->orderBy('id', 'DESC')->get();
        //  dd($blog);
        return view('web.pages.blog.index', compact('blogs'));
    }

    public function blogDetails($id)
    {
        // dd($id);
        $blog = Blog::find($id);
        // dd($blog);

        return view('web.pages.blog.details', compact('blog'));
    }

    public function about()
    {
        // dd('ok');
        return view('web.pages.about');
    }

    public function contact()
    {
        return view('web.pages.contact');
    }

    public function services()
    {
        $services = Service::where('status', '1')->orderBy('created_at', 'ASC')->get();
        // dd($services);
        return view('web.pages.service.index', compact('services'));
    }
    public function servicedetails($id)
    {

        $serice = Service::find($id);
        $projects = Project::where('status', '1')->where('service', $serice->id)->orderBy('created_at', 'ASC')->get();

        // dd($service);
        return view('web.pages.service.details', compact('serice', 'projects'));
    }

    // public function service($id)
    // {
    //     $singleservice = Service::find($id);
    //     $projects = project::where('project_category', $id)->where('status', '1')->orderBy('order', 'ASC')->get();
    //     return view('web.pages.service.index', compact('projects', 'singleservice'));
    // }
    public function projects()
    {
        $categories = Service::orderBy('created_at', 'ASC')->where('status', '1')->get();
        $projects = Project::orderBy('created_at', 'ASC')->get();
        // dd($projects);
        return view('web.pages.project.index', compact('projects', 'categories'));
    }
    public function projectdetails($id)
    {

        $project = Project::find($id);
        $projects = Project::where('status', '1')->orderBy('created_at', 'ASC')->get();

        // dd($projects);
        return view('web.pages.project.details', compact('projects', 'project'));
    }
}
