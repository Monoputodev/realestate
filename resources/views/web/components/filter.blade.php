<section class="property-search-field-top position-reletive">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="property-search-field bg-white">
                    <div class="property-search-item">
                        <form class="row basic-select-wrapper" action="{{ route('filter') }}" method="POST">
                            @csrf
                            <div class="form-group col-lg-3 col-md-6">
                                <label class="form-label">Property type</label>
                                <select name="type" class="form-control basic-select">
                                    <option value="0">Choose</option>
                                    @foreach ($type as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control basic-select">
                                    <option value="0">Choose</option>
                                    @foreach ($propertystatus as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label class="form-label">Location</label>
                                <select name="location" class="form-control basic-select">
                                    <option value="0">Choose</option>
                                    @foreach ($location as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-flex col-lg-3">

                                <span class="align-items-center ms-3 d-none d-md-block"><button
                                        class="btn btn-primary d-flex align-items-center" type="submit"><i
                                            class="fas fa-search me-1"></i><span>Search</span></button></span>
                            </div>

                            <div class="d-md-none d-grid btn-mobile  m-3">
                                <button class="btn btn-primary d-grid align-items-center" type="submit"><i
                                        class="fas fa-search me-1"></i><span>Search</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
