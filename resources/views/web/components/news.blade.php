@if($news->count() > 0)
<div id="news" data-scroll-index="7" class="monoputo-news-wrape pb-100 pt-100 bgc-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="monoputo-section-area mb-40 text-center">
                    <h4 class="mb-20">News / Publications</h4>
                </div>
                <div class="monoputo-all-blog-list owl-carousel owl-theme">
                    @foreach ($news as $newsItem)
                    <!-- single blog start -->
                    <div class="monoputo-single-blog-wrape mb-30 magic-hover magic-hover__square" data-bs-toggle="modal"
                      data-bs-target="#blog{{ $newsItem->id }}">
                        <img src="{{ asset('') }}uploads/news/{{ $newsItem->image }}" alt="blog" data-bs-toggle="modal"
                          data-bs-target="#blog{{ $newsItem->id }}">
                        <div class="single-blog-content">
                            <h4 class="post-title" data-bs-toggle="modal" data-bs-target="#blog{{ $newsItem->id }}">
                                {{ $newsItem->title }}
                            </h4>
                            <ul class="single-post-info">
                                <li class="blog-admin"><a href="#"><i class="fa fa-clock"></i>
                                        {{ $newsItem->created_at->format('D h:i:a') }}</a>
                                </li>
                                <li class="blog-date"><i class="fa fa-calendar-minus-o"></i>
                                    {{ $newsItem->created_at->format('d M Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- single blog end -->
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($news as $newsItem)
<!-- blog details modal area start -->
<div class="modal fade" id="blog{{ $newsItem->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">

                <!-- blog details area start -->
                <div id="monoputo-blog-area" class="monoputo-blog-area mt-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 px-30">
                                <div class="monoputo-blog-details-wraper">
                                    <div class="blog-details-content">
                                        <h4 class="post-title">{{ $newsItem->title }}</h4>
                                        <p>{{ $newsItem->subtitle }}</p>
                                        <figure>
                                            <img src="{{ asset('') }}uploads/news/{{ $newsItem->image }}" alt="img">
                                        </figure>
                                        {!!$newsItem->description !!}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- blog details area end -->
            </div>
        </div>
    </div>
</div>
<!-- blog details modal area end -->

@endforeach

@endif