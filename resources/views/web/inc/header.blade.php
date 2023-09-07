<header class="header">

    <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
        <div class="container-fluid">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
                  class="fas fa-align-left"></i></button>
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="img-fluid" src="{{ asset('') }}uploads/content/{{ $content->website_logo }}" alt="logo">
            </a>
            <div class="navbar-collapse collapse justify-content-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="{{ route('index') }}" class="nav-link" aria-expanded="false">Home</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('service.index') }}" class="nav-link" aria-expanded="false">Service</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('projects.all') }}" class="nav-link" aria-expanded="false">Property</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('about') }}" class="nav-link" aria-expanded="false">About Us</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('blogs.all') }}" class="nav-link" aria-expanded="false">Blogs</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('contact') }}" class="nav-link" aria-expanded="false">Contact Us</a>

                    </li>
                </ul>
            </div>
            <div class="add-listing d-none d-sm-block">
                <div class="me-3 d-inline-block">
                    <a href="tel:{{ $content->website_phone }}"><i
                          class="fa fa-phone me-2 fa fa-flip-horizontal"></i>{{ $content->website_phone }}
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>