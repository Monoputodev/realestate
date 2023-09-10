@extends('admin.app.app')
@section('main-content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Property Status</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">propertystatus</a></li>
                                <li class="breadcrumb-item active">Edit Property Status</li>
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
                            <form method="POST" action="{{ route('propertystatus.update',$propertystatus->id) }}"
                              enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                          value="{{ $propertystatus->name }}">
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
