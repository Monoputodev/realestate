@extends('admin.app.app')
@section('main-content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Service</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">service</a></li>
                                <li class="breadcrumb-item active">Edit Service</li>
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
                            <form method="POST" action="{{ route('services.update',$service->id) }}"
                              enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="ranking" class="form-label">Item Order</label>
                                        <input type="text" class="form-control" id="ranking"
                                          value="{{ $service->ranking }}" name="ranking" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                          value="{{ $service->title }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="subtitle" class="form-label">subtitle</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                                          value="{{ $service->subtitle }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="summernote" type="text" class="form-control" id="description"
                                          name="description" required>{!! $service->description !!}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control dropify" id="image" name="image"
                                          data-default-file="{{asset('uploads/services/'.$service->image)}}">
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