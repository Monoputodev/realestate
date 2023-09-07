@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Contact us
                            </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact-address bg-light p-4">
                        <div class="d-flex mb-3">
                            <div class="contact-address-icon">
                                <i class="flaticon-map text-primary font-xlll"></i>
                            </div>
                            <div class="ms-3">
                                <h6>Address</h6>
                                <p>{{ $content->website_address }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contact-address-icon">
                                <i class="flaticon-email text-primary font-xlll"></i>
                            </div>
                            <div class="ms-3">
                                <h6>Email</h6>
                                <p>{{ $content->website_email }}</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contact-address-icon">
                                <i class="flaticon-call text-primary font-xlll"></i>
                            </div>
                            <div class="ms-3">
                                <h6>Phone Number</h6>
                                <p>{{ $content->website_phone }}</p>
                            </div>
                        </div>

                        <div class="social-icon-02">
                            <div class="d-flex align-items-center">
                                <h6 class="me-3">Social:</h6>
                                <ul class="list-unstyled mb-0 list-inline">
                                    <li><a href="{{ $content->facebook }}"> <i class="fab fa-facebook-f"></i> </a></li>
                                    <li><a href="{{ $content->whatsapp }}"> <i class="fab fa-whatsapp"></i> </a></li>
                                    <li><a href="{{ $content->linkdin }}"> <i class="fab fa-linkedin"></i> </a></li>
                                    <li><a href="{{ $content->youtube }}"> <i class="fab fa-youtube"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <div class="contact-form">
                        <h4 class="mb-4">Need assistance? Please complete the contact form</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <h6 class="text-white">Ask About this Property</h6>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Your email Adress">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="phone" placeholder="Your Phone number">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" name="message"
                                  placeholder="Write Message"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary d-grid" href="#">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection