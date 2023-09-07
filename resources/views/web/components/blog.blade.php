<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2>News, tips &amp; articles</h2>
                    <p>Grow your appraisal and real estate career with tips, trends, insights and learn more about our
                        expert's advice.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="blog-post">
                    <div class="blog-post-image">
                        <a href="{{ route('blog.details',$blog->id) }}">
                            <img class="img-fluid" src="{{ asset('') }}uploads/blogs/{{ $blog->image }}" alt="">
                        </a>
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-post-details">

                            <div class="blog-post-title">
                                <h5><a href="{{ route('blog.details',$blog->id) }}">{{ $blog->title }}</a></h5>
                            </div>
                            <div class="blog-post-description">
                                <p class="mb-0">{{ $blog->subtitle }}</p>
                            </div>
                        </div>
                        <div class="blog-post-footer">
                            <div class="blog-post-time">
                                <a href="{{ route('blog.details',$blog->id) }}"> <i
                                      class="far fa-clock"></i>{{ $blog->created_at->format('d M Y') }}</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center">
                <a class="btn btn-link" href="{{ route('blogs.all') }}"><i class="fas fa-plus"></i>View All
                    Listings</a>
            </div>

        </div>
    </div>
</section>