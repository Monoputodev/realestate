<section class="space-pb pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-2">
                    <p class="m-3">{!! $content->about_content !!}</p>
                </div>


            </div>
            <div class="col-lg-4">
                <img class="img-fluid" src="{{ asset('') }}uploads/content/{{ $content->about_image }}" alt="">
            </div>
        </div>
    </div>
</section>