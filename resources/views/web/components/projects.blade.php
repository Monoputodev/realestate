<section class="space-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2>Newly listed properties</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($projects as $k=> $project)
            <div class="col-md-4">
                <div class="property-item">
                    <div class="property-image text-center bg-overlay-gradient-04">
                        <a href="{{ route('project.details',$project->id) }}"></a>
                        <img class="img-fluid" src="{{ asset('') }}uploads/projects/{{ $project->thumbnail }}" alt="">
                        </a>
                        <div class="property-lable">
                            <span class="badge badge-md bg-primary">{{ $project->status }}</span>
                            <span class="badge badge-md bg-info">{{ $project->bedroom }} </span>
                        </div>


                    </div>
                    <div class="property-details">
                        <div class="property-details-inner">
                            <h5 class="property-title"><a
                                  href="{{ route('project.details',$project->id) }}">{{ $project->title }}</a>
                            </h5>
                            <span class="property-address"><i
                                  class="fas fa-map-marker-alt fa-xs"></i>{{ $project->location }}</span>
                            <span class="property-agent-date"><i class="far fa-clock fa-md"></i>
                                {{ $project->created_at->diffForHumans() }}</span>

                        </div>
                        <div class="property-btn">
                            <a class="property-link" href="{{ route('project.details',$project->id) }}">See Details</a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-12 text-center">
                <a class="btn btn-link" href="{{ route('projects.all') }}"><i class="fas fa-plus"></i>View All
                    Listings</a>
            </div>
        </div>
    </div>
</section>