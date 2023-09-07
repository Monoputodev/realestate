@if($photos->count() > 0)

<section class="space-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2>Photo Gallery</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($photos as $photo)
                    <div class="col-md-4 mb-4 mb-lg-0">
                        <a href="property-grid.html">
                            <div class="location-item bg-overlay-gradient bg-holder"
                              style="background-image: url({{ asset('uploads/photos/' . $photo->image) }});">
                                <div class="location-item-info">
                                    <span class="location-item-list">{{ $photo->title }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>

@endif