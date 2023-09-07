@if($testimonials->count()>0)


<section class="testimonial-main bg-holder" style="background-image: url({{ asset('') }}assets/web/images/bg/02.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-dots-bottom-left" data-nav-dots="true" data-items="1" data-md-items="1"
                  data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
                    @foreach ($testimonials as $testimonial)
                    <div class="item">
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <p><i class="quotes">"</i>{{ $testimonial->description }}"</p>
                            </div>
                            <div class="testimonial-name">
                                <h6 class="text-primary mb-1">{{ $testimonial->title }}</h6>
                                <span>{{ $testimonial->subtitle }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>

@endif
