@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                        <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">About Us</a></li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="space-pb">
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

</div>
@endsection