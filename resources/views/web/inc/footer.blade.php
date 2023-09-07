<footer class="footer bg-dark space-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer-contact-info">
                    <h5 class="text-primary mb-4">About {{ $content->website_name }}</h5>
                    <p class="text-white mb-4">{{ $content->website_description }}.</p>
                    <ul class="list-unstyled mb-0">
                        <li> <b> <i class="fas fa-map-marker-alt"></i></b><span>{{ $content->website_address }}</span>
                        </li>
                        <li> <b><i class="fas fa-microphone-alt"></i></b><span>{{ $content->website_phone }}</span>
                        </li>
                        <li> <b><i class="fas fa-headset"></i></b><span>{{ $content->website_email }}</span> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                <div class="footer-link">
                    <h5 class="text-primary mb-4">Useful links</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="">
                            <a href="{{ route('index') }}" class="nav-link" aria-expanded="false">Home</a>

                        </li>
                        <li class="">
                            <a href="{{ route('service.index') }}" class="nav-link" aria-expanded="false">Service</a>

                        </li>
                        <li class="">
                            <a href="{{ route('projects.all') }}" class="nav-link" aria-expanded="false">Property</a>

                        </li>
                        <li class="">
                            <a href="{{ route('about') }}" class="nav-link" aria-expanded="false">About Us</a>

                        </li>
                        <li class="">
                            <a href="{{ route('blogs.all') }}" class="nav-link" aria-expanded="false">Blogs</a>

                        </li>
                        <li class="">
                            <a href="{{ route('contact') }}" class="nav-link" aria-expanded="false">Contact Us</a>

                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                <div class="footer-recent-List">
                    <h5 class="text-primary mb-4">Recently listed properties</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach ($properties as $property)
                        <li>
                            <div class="footer-recent-list-item">
                                <img class="img-fluid" src="{{ asset('') }}uploads/projects/{{ $property->thumbnail }}"
                                  alt="">
                                <div class="footer-recent-list-item-info">
                                    <h6 class="text-white"><a class="category font-md mb-2"
                                          href="{{ route('project.details',$property->id) }}">{{ $property->title }}</a>
                                    </h6>
                                    <span class="price text-white">{{ $property->created_at->diffForHumans() }} </span>
                                </div>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-start">
                    <a href="index.html"><img class="img-fluid footer-logo"
                          src="{{ asset('') }}uploads/content/{{ $content->website_logo }}" alt="">
                    </a>
                </div>
                <div class="col-md-4 text-center my-3 mt-md-0 mb-md-0">
                    <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-double-up"></i> </a>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <p class="mb-0 text-white"> &copy;Copyright <span id="copyright">
                            <script>
                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                            </script>
                        </span> <a href="#"> {{ $content->website_name }} </a> All Rights Reserved </p>
                </div>
            </div>
        </div>
    </div>
</footer>