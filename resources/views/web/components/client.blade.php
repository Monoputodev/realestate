@if($clients->count()>0)
<div class="monoputo-team-area pt-100 pb-100" id="clients" data-scroll-index="4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="monoputo-section-area text-center mb-40">
                    <h4 class="mb-20 aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">Clients</h4>
                </div>
                <div class="all-team-area owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="700"
                  data-aos-delay="500">
                    @foreach ($clients as $client)
                    <!-- single team start -->
                    <div
                      class="single-team-area d-flex align-content-center align-items-center justify-content-center magic-hover magic-hover__square">
                        <div class="single-team-img">
                            <img src="{{ asset('') }}uploads/clients/{{ $client->image }}" alt="">
                        </div>
                        <div class="single-team-content-area">
                            <h3>{{ $client->title }}</h3>

                        </div>
                    </div>
                    <!-- single team end -->
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endif