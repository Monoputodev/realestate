@extends('web.app.app')


@section('main-body')
<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                    <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Property</a></li>
                    <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>
                            {{ $project->title }}</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="space-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="property-detail-title">
                    <h3>{{ $project->title }}</h3>
                    <span class="d-block mb-4"><i
                          class="fas fa-map-marker-alt fa-xs pe-2"></i>{{ $project->location }}</span>
                    <a class="btn btn-dark" href="{{ asset('') }}uploads/projects/{{ $project->brochure }}"
                      download>Download Vrochure</a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
                <div class="sticky-top">
                    <div class="sidebar">
                        <div class="agent-contact mb-4">
                            <div class="agent-contact-inner bg-dark p-4">

                                <div class="d-flex mb-4 align-items-center">
                                    <h6 class="text-primary border p-2 mb-0"><a href="#"><i
                                              class="fas fa-phone-volume text-white pe-2"></i>{{ $content->website_phone }}</a>
                                    </h6>
                                    <a class="btn btn-link p-0 ms-auto text-white"
                                      href="{{ route('projects.all') }}"><u>View all
                                            listing </u></a>
                                </div>
                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <h6 class="text-white">Ask About this Property</h6>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email"
                                          placeholder="Your email Adress">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="phone"
                                          placeholder="Your Phone number">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3" name="message"
                                          placeholder="Write Message"></textarea>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label text-white" for="flexCheckDefault">
                                            I here by agree for processing my personal data
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary d-grid" href="#">Send Message</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 order-lg-1">

                <div class="property-detail-gallery overflow-hidden">
                    <img src="{{ asset('') }}uploads/projects/{{ $project->image }}" class="img-fluid" alt="">
                </div>
                <div class="property-info p-4 mt-5">
                    <div class="row">


                        <div class="col-md-6">
                            <div class="stat_box p-2">
                                <h5 class="text-center text-success">Appartment Size</h5>
                                <h6 class="text-center text-dark">{{ $project->apartment_size }}</h6>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="stat_box p-2">
                                <h5 class="text-center text-success">Completion Date </h5>
                                <h6 class="text-center text-dark">{{ $project->completion_date }}</h6>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <div class="stat_box p-2">
                                <h5 class="text-center text-success">Bedroom </h5>
                                <h6 class="text-center text-dark">{{ $project->bedroom }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="stat_box p-2">
                                <h5 class="text-center text-success">Status </h5>
                                <h6 class="text-center text-dark">{{ $project->status }}</h6>
                            </div>
                        </div>

                    </div>
                </div>
                @if($project->experience)
                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                <div class="property-description">
                    <div class="row">

                        <div class="col-sm-12">
                            <h5>Experience</h5>
                            <p>
                                {!! $project->experience !!}
                            </p>


                        </div>
                    </div>
                </div>
                @endif
                @if($project->features)
                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                <div class="property-description">
                    <div class="row">

                        <div class="col-sm-12">
                            <h5>Features</h5>
                            <p>
                                {!! $project->features !!}
                            </p>


                        </div>
                    </div>
                </div>
                @endif
                @if($project->floor_plan)
                <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                <div class="property-description">
                    <div class="row">

                        <div class="col-sm-12">
                            <h5>Floor Plan</h5>
                            <p>
                                {!! $project->floor_plan !!}
                            </p>


                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</section>
<!--=========== project section Start =========-->

@endsection