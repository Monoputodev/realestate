@extends('admin.app.app')
@section('main-content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Create Project</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                    <li class="breadcrumb-item active">Create Project</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="subtitle" class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" id="subtitle" name="subtitle"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="location" class="form-label">Property Location :</label>
                                            <select id="location" name="location" class="form-select">

                                                <option selected="">Choose...</option>
                                                @foreach ($location as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="propertytype" class="form-label">Property Type :</label>
                                            <select id="propertytype" name="propertytype" class="form-select">

                                                <option selected="">Choose...</option>
                                                @foreach ($type as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="propertystatus" class="form-label">Property Status :</label>
                                            <select id="propertystatus" name="propertystatus" class="form-select">

                                                <option selected="">Choose...</option>
                                                @foreach ($propertystatus as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control dropify" id="image"
                                                name="image">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="thumbnail" class="form-label">thumbnail</label>
                                            <input type="file" class="form-control dropify" id="thumbnail"
                                                name="thumbnail">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="brochure" class="form-label">Brochure (only pdf)</label>
                                            <input type="file" class="form-control dropify" id="brochure"
                                                name="brochure">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="apartment_size" class="form-label">Apartment Size</label>
                                            <input type="text" class="form-control" id="apartment_size"
                                                name="apartment_size">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="bedroom" class="form-label">Bedroom</label>
                                            <input type="number" class="form-control" id="bedroom" name="bedroom">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="completion_date" class="form-label">Completion Date</label>
                                            <input type="text" class="form-control" id="completion_date"
                                                name="completion_date">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="statuss" name="status">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="experience" class="form-label">Experience</label>
                                            <textarea id="summernote" type="text" class="form-control" id="experience" name="experience"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="features" class="form-label">Features</label>
                                            <textarea id="summernote1" type="text" class="form-control" id="features" name="features">
                                    </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="floor_plan" class="form-label">Floor Plan</label>
                                            <textarea id="summernote2" type="text" class="form-control" id="floor_plan" name="floor_plan"></textarea>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->


        {{-- </div> --}}
    @endsection
