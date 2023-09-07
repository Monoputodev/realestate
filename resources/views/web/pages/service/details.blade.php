@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <div class="sc-project-pages-area sc-pt-85 sc-md-pt-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sc-project-content-area">
                        <div class="sc-project-details-inner">
                            <h2 class="title sc-mb-25">{{ $service->title }}</h2>

                            <div class="row sc-mb-40">
                                <div class="col-lg-8">
                                    <div class="sc-project-image">
                                        <img src="{{ asset('uploads/services/' . $service->image) }}" alt="Project">
                                    </div>
                                </div>

                            </div>
                            <div class="sc-project-text">
                                <h3 class="sc-title">service Description</h3>
                                <p class="des sc-mb-25">
                                    {!! $service->details !!}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=========== project section Start =========-->

@endsection