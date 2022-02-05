@extends('master')
@section('title', 'AP1 Series | LPP Report')
@section('body')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
<script src="/assets/vendors/jquery/jquery.min.js"></script>
<script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
<!-- Sweet Alert Delete -->
<script>
    $('.deleted').click(function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        Swal.fire({
            title: 'Are you sure?',
            text: "Want to delete this data (" + name + ")",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#AAAAAA',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'info',
                    title: 'Hold on, delete in progress'
                })
                window.location = "/category/delete/" + id
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<!-- End Sweet Alert Delete -->
@endsection
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>LPP Report</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">LPP Report</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="#">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addData">
                        Add Data <i class="bi bi-plus-lg"></i>
                    </button>
                </a>
                <!-- Assets Datatable -->
            </div>

            <!-- Add Data Modal -->
            <div class="modal fade text-left" id="addData" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title white" id="myModalLabel160">Add Data
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-vertical" method="POST" action="{{route('lpp.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Category</label>
                                                <div class="position-relative mb-2">
                                                    <select class="select2 form-select" name="category_id" style="width: 100%;">
                                                        @foreach ($categories as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Department</label>
                                            <div class="position-relative mb-2">
                                                <select class="select2 form-select" name="department_id" style="width: 100%;">
                                                    @foreach ($departments as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Year</label>
                                                <div class="position-relative">
                                                    <input type="number" name="year" class="form-control" placeholder="Year" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Rent Status</label>
                                                <select class="select2 form-select" name="rent_status" style="width: 100%;" required>
                                                    <option value="Lama">Lama</option>
                                                    <option value="Baru">Baru</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Quantity</label>
                                                <div class="position-relative">
                                                    <input type="number" name="qty" class="form-control" placeholder="Quantity" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Usage</label>
                                                <div class="position-relative">
                                                    <input type="number" name="usage_condition" class="form-control" placeholder="Usage" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Unit Price</label>
                                                <div class="position-relative">
                                                    <input type="number" name="unit_price" class="form-control" placeholder="Unit Price" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Usage (Realization)</label>
                                                <div class="position-relative">
                                                    <input type="number" name="usage_realization" class="form-control" placeholder="Usage (Realization)" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Cancel</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Add</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Qty</th>
                            @if (Auth::user()->role != 'viewer')
                            <th>Action</th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>{{ $data->department->name }}</td>
                            <td>{{ $data->year }}</td>
                            <td>{{ $data->rent_status }}</td>
                            <td>{{ $data->qty }}</td>
                            @if (Auth::user()->role != 'viewer')
                            <td class="d-flex">
                                <a href="#"><button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showData{{ $data->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editData{{ $data->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>

                                <a href="#"><button type="button" class="btn btn-danger deleted" data-id="{{$data->id}}" data-name="{{$data->name}}"> <i class="fa fa-trash-alt"></i></button></a>
                            </td>
                            @endif

                            <!-- modal show data -->
                            <div class="modal fade text-left" id="showData{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title white" id="myModalLabel160">Detail Data
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Category</label>
                                                                <div class="position-relative mb-2">
                                                                    <select class="select2 form-select" name="category_id" style="width: 100%;">
                                                                        @foreach ($categories as $cat)
                                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Department</label>
                                                            <div class="position-relative mb-2">
                                                                <select class="select2 form-select" name="department_id" style="width: 100%;">
                                                                    @foreach ($departments as $dep)
                                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Year</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="year" class="form-control" placeholder="Year" id="password-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Rent Status</label>
                                                                <select class="select2 form-select" name="rent_status" style="width: 100%;" required>
                                                                    <option value="Lama">Lama</option>
                                                                    <option value="Baru">Baru</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="qty" class="form-control" placeholder="Quantity" id="password-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-sort-numeric-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Usage</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="usage_condition" class="form-control" placeholder="Usage" id="password-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-sort-numeric-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Unit Price</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="unit_price" class="form-control" placeholder="Unit Price" id="password-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-sort-numeric-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">OK</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- modal edit data -->
                            <div class="modal fade text-left" id="editData{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title white" id="myModalLabel160">Edit Data
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-vertical" method="POST" action="{{ route('category.update', $data->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Category</label>
                                                <div class="position-relative mb-2">
                                                    <select class="select2 form-select" name="category_id" style="width: 100%;">
                                                        @foreach ($categories as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Department</label>
                                            <div class="position-relative mb-2">
                                                <select class="select2 form-select" name="department_id" style="width: 100%;">
                                                    @foreach ($departments as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Year</label>
                                                <div class="position-relative">
                                                    <input type="number" name="year" class="form-control" placeholder="Year" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Rent Status</label>
                                                <select class="select2 form-select" name="rent_status" style="width: 100%;" required>
                                                    <option value="Lama">Lama</option>
                                                    <option value="Baru">Baru</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Quantity</label>
                                                <div class="position-relative">
                                                    <input type="number" name="qty" class="form-control" placeholder="Quantity" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Usage</label>
                                                <div class="position-relative">
                                                    <input type="number" name="usage_condition" class="form-control" placeholder="Usage" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Unit Price</label>
                                                <div class="position-relative">
                                                    <input type="number" name="unit_price" class="form-control" placeholder="Unit Price" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Cancel</span>
                                            </button>
                                            <button type="submit" class="btn btn-warning ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Update</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <button type="button" class="btn btn-success rounded-3 pl-3 pr-3">Print Report .xlsx
                    <i class="fa fa-print ml-2"></i></button>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>
@endsection