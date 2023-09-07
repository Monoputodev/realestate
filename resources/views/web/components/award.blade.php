@if($awards->count() > 0)


<div id="award" data-scroll-index="3" class="monoputo-project-are project-bg pt-100 pb-100 position-relative"
  style="background-image: url('{{ asset('') }}/assets/web/img/project/bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="monoputo-section-area text-center mb-40">
                    <h4 class="mb-20" data-aos="fade-up" data-aos-duration="500">my Award</h4>
                </div>

                <div class="all-project-area owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="700"
                  data-aos-delay="500">
                    @foreach ($awards as $award)
                    <!-- single project start -->
                    <div class="single-project-area magic-hover magic-hover__square">
                        <div class="single-project-content-area position-relative">
                            <div class="project-img position-relative">
                                <img src="{{ asset('') }}uploads/awards/{{ $award->image }}" alt="project1">
                                <ul class="project-hover-link d-flex align-items-center justify-content-center">
                                    <li><a class="project-views"
                                          href="{{ asset('') }}uploads/awards/{{ $award->image }}"><i
                                              class="fa fa-arrows-alt"></i></a></li>
                                    <li><a class="project-links" target="_blank" href="#" data-bs-toggle="modal"
                                          data-bs-target="#award{{ $award->id }}"><i class="fa fa-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="project-all-content">
                                <div class="project-content position-relative">

                                    <h4><a href="#">{{ $award->title }}</a></h4>
                                    <p>{{ $award->sub_title }}</p>
                                    <div class="project-link">
                                        <a href="#" class="btn-4" data-bs-toggle="modal"
                                          data-bs-target="#award{{ $award->id }}"><i
                                              class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single project end -->
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>


@foreach ($awards as $award)
<!-- award details modal area start -->
<div class="modal fade" id="award{{ $award->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">

                <!-- award details area start -->
                <div id="monoputo-award-area" class="monoputo-award-area mt-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 px-30">
                                <div class="monoputo-award-details-wraper">
                                    <div class="award-details-content">
                                        <h4 class="post-title">{{ $award->title }}</h4>
                                        <p>{{ $award->subtitle }}</p>
                                        <figure>
                                            <img src="{{ asset('') }}uploads/awards/{{ $award->image }}" alt="img">
                                        </figure>
                                        {!!$award->description !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- award details area end -->
            </div>
        </div>
    </div>
</div>
<!-- award details modal area end -->

@endforeach

@endif