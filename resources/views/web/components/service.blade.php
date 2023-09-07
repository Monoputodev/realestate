<section class="space-ptb">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="bg-light p-4 py-5 text-center h-100">
                    <img src="{{ asset('') }}uploads/services/{{ $service->image }}" class="w-100" alt="">
                    <h5 class="mb-3">{{ $service->title }}</h5>
                    <p class="mb-0">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center">
                <a class="btn btn-link" href="{{ route('service.index') }}"><i class="fas fa-plus"></i>View All
                    Listings</a>
            </div>

        </div>
    </div>
</section>