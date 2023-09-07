<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Content;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $content =  Content::find(1)->first();
        view()->share('content', $content);


        $services = Service::orderBy('ranking', 'ASC')->where('status', '1')->get();
        view()->share('services', $services);

        $blogs = Blog::orderBy('id', 'DESC')->get();
        view()->share('blogs', $blogs);
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        view()->share('testimonials', $testimonials);

        //  $destinations = Destination::orderBy('ranking', 'ASC')->where('status', '1')->get();
        //  view()->share('destinations', $destinations);


        $properties = Project::orderBy('created_at', 'ASC')->get();
        view()->share('properties', $properties);
    }
}
