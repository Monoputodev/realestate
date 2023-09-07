@extends('web.app.app')
@section('main-body')

<!--=================================
banner -->
@include('web.components.hero')

@include('web.components.about')
<!--=================================
banner -->

<!--=================================
feature -->
@include('web.components.service')
<!--=================================
feature -->

<!--=================================
Featured properties-->
@include('web.components.projects')
<!--=================================
Featured properties-->

@include('web.components.review')

@include('web.components.blog')
@include('web.components.gallery')

<!--=================================
Need any help? -->

<!--=================================
Need any help?-->

<!--=================================
call to action -->
<section class="py-5 bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <h2 class="text-white mb-0">Looking to sell or rent your property?</h2>
            </div>
            <div class="col-lg-3 text-lg-end mt-3 mt-lg-0">
                <a class="btn btn-white" href="{{ route('contact') }}">Get a free quote</a>
            </div>
        </div>
    </div>
</section>
<!--=================================
call to action -->

@endsection