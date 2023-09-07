<section class="clearfix">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($heros as $k=> $hero)
            <li data-bs-target="#slider" data-bs-slide-to="{{ $k }}" class="@if($k == 1) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($heros as $k=> $hero)
            <div class="carousel-item @if($k == 1) active @endif">
                <img class="img-fluid" src="{{ asset('') }}uploads/hero/{{ $hero->image }}" alt="">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-10">
                                <span class="text-white animated-07">{{ $hero->title }}</span>
                                <h1 class="text-white mb-3 animated-08">{{ $hero->subtitle }}</h1>
                                {{-- <a href="#" class="btn btn-link animated-08">View more <i
                                      class="fas fa-arrow-right ps-2"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

    </div>
</section>