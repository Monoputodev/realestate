<section class="space-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2>Find properties in these cities</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($photos as $photo)
            <div class="col-lg-6 mt-4 mt-lg-0">
                <a href="property-grid.html">
                    <div class="location-item location-item-big bg-overlay-gradient bg-holder"
                      style="background-image: url({{ assets('') }}uploads/photos/{{ $photo->image }});">
                        <div class="location-item-info">
                            <h5 class="location-item-title">{{ $photo->title }} </h5>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>