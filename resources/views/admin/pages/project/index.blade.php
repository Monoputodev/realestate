@extends('admin.app.app')
@section('styles')
<!-- DataTables -->
<link href="{{ asset('') }}assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
  type="text/css" />
<link href="{{ asset('') }}assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
  type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('') }}assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
  rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Project</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Project</li>
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

                            <a class="btn btn-soft-primary waves-effect waves-light mb-2"
                              href="{{ route('projects.create') }}">
                                + Create New Project </a>

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>status</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Location</th>
                                        <th>Apartment Size</th>
                                        <th>Bedroom</th>
                                        <th>Completion Date</th>
                                        <th>Image</th>
                                        <th>Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                    <tr>
                                        <td>
                                            <span
                                              class="badge rounded-pill badge-soft-dark font-size-11">{{ $project->status }}</span>

                                        </td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->service }}</td>
                                        <td>{{ $project->location }}</td>
                                        <td>{{ $project->apartment_size }}</td>
                                        <td>{{ $project->bedroom }}</td>
                                        <td>{{ $project->completion_date }}</td>

                                        <td>
                                            @if ($project->image)
                                            <img height="100"
                                              src="{{ asset('uploads/projects/' . $project->thumbnail) }}"
                                              alt="{{ $project->title }}" width="80">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td>
                                            @if ($project->image)
                                            <img height="100" src="{{ asset('uploads/projects/' . $project->image) }}"
                                              alt="{{ $project->title }}" width="80">
                                            @else
                                            No Image
                                            @endif
                                        </td>
                                        <td>


                                            <a class="btn btn-primary waves-effect btn-circle waves-light"
                                              href="{{ route('projects.edit', $project->id) }}">
                                                <i class="fa fa-edit"></i> </a>
                                            <form hidden action="{{ route('projects.destroy', $project->id) }}"
                                              id="form{{ $project->id }}" method="get">
                                                @csrf
                                            </form>
                                            <button class="btn btn-danger waves-effect btn-circle waves-light"
                                              onclick="deleteItem({{ $project->id }});" type="button">
                                                <i class="fa fa-trash"></i> </button>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
@endsection
@section('scripts')
<script>
    function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('ok');
                    document.getElementById(`form${id}`).submit();
                }
            })
        }
</script>
@endsection