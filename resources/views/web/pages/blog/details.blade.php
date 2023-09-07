@extends('web.app.app')


@section('main-body')
<div class="main-body">

    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                        <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Blog</a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i>
                            <span>{{ $blog->title }}</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-detail">
                        <div class="blog-post">
                            <div class="blog-post-title">
                                <h2>{{ $blog->title }}</h2>
                            </div>

                            <div class="blog-post-footer border-0 justify-content-start">
                                <div class="blog-post-time ms-0">
                                    <a href="#"> <i
                                          class="far fa-clock"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                </div>

                            </div>
                            <div class="blog-post-image">
                                <img class="img-fluid mb-4" src="{{ asset('') }}uploads/blogs/{{ $blog->image }}"
                                  alt="">
                            </div>
                            <div class="blog-post-content border-0">
                                <div class="blog-post-description">
                                    <p class="mb-0">

                                        {!!$blog->description !!}
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection