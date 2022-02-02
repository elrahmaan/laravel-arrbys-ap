@extends('master')
@section('title', 'AP1 Series | Services of Asset')
@section('body')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
<script src="/assets/vendors/jquery/jquery.min.js"></script>
<script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/choices.js/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="assets/js/pages/form-element-select.js"></script>
<script src="assets/vendors/select2/form-select2.min.js"></script> -->

<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
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
                window.location = "/service/delete/" + id
            }
        })
    })
</script>
<!-- End Sweet Alert Delete -->
<script>
    $(document).ready(function() {
        $('.logs .btn').click(function() {
            var span = $(this).find('span')
            span.toggleClass('bi-caret-right-fill')
            span.toggleClass('bi-caret-down-fill')
        })
    })
</script>
@endsection
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Service of Assets</h3>
                <!-- <p class="text-subtitle text-muted">Trouble Assets</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                            <form class="form form-vertical" method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Asset Name*</label>
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control" placeholder="Asset Name" id="first-name-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                            <label for="email-id-icon">Image</label>
                                            <div class="position-relative mb-2">
                                                <input class="form-control" name="image" type="file" id="formFile" required>
                                                <!-- <img src="" alt=""> -->
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Category Asset</label>
                                                <select class="select2 form-select" name="category_asset" style="width: 100%;" required>
                                                    <option value="AP">AP</option>
                                                    <option value="Sewa">Sewa</option>
                                                    <option value="Other">Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="mobile-id-icon">Detail (Specification)*</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="detail_of_specification" id="" rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Quantity*</label>
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
                                                <label for="password-id-icon">Complainant</label>
                                                <div class="position-relative">
                                                    <input type="text" name="complainant_name" class="form-control" placeholder="Complainant Name" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Department of Complainant</label>
                                            <div class="position-relative mb-2">
                                                <select class="select2 form-select" name="department_id" style="width: 100%;">
                                                    @foreach ($departments as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Status</label>
                                            <div class="position-relative mb-2">
                                                <span class="badge bg-warning">In Repair</span>
                                                <input type="hidden" name="status" value="In Repair">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Complain Desc</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="desc_complain" id="" rows="5"></textarea>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Date of entry*</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" name="date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                            </div>
                                        </div>
                                        <!-- <div class="col-12">
                                            <label for="password-id-icon">Estimated date completed</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" name="date_estimation_fixed" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                            </div>
                                        </div> -->
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
                            <th>ID</th>
                            <th>Asset Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        @if ($service->status != 'New')
                        <tr>
                            <td>{{$service->id}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->category->name}}</td>
                            <td><img src="{{asset($service->image)}}" alt="" style="max-height: 40px"></td>
                            <td>{{$service->qty}}</td>
                            <td>{{$service->date}}</td>
                            <td>
                                @if ($service->status == 'Fixed')
                                <span class="badge bg-success">Fixed</span>
                                @elseif ($service->status == 'In Repair')
                                <span class="badge bg-warning">In Repair</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="#"><button type="button" class="btn btn-primary me-1 mb-2" data-bs-toggle="modal" data-bs-target="#showData{{$service->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                @if ($service->status == 'Fixed')
                                <a href="#"><button type="button" class="btn btn-secondary mb-2 me-1" data-bs-toggle="modal" data-bs-target="#newData{{$service->id}}">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </a>
                                @else
                                <a href="#"><button type="button" class="btn btn-dark mb-2 me-1" data-bs-toggle="modal" data-bs-target="#repairData{{$service->id}}">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </a>
                                @endif
                                <a href="#"><button type="button" class="btn btn-info me-1" data-bs-toggle="modal" data-bs-target="#logData{{$service->id}}">
                                        <i class="fa fa-clipboard-list"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-danger  deleted" data-id="{{$service->id}}" data-name="{{$service->name}}"> <i class="fa fa-trash-alt"></i></button></a>
                            </td>

                            <!-- modal show data -->
                            <div class="modal fade text-left" id="showData{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                                                <label for="id-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="{{$service->id}}" id="id-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-key-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="id-icon">Category</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="{{$service->category->name}}" id="id-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-grid-1x2-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" value="{{$service->name}}" id="first-name-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative mb-2">
                                                                <img src="{{asset($service->image)}}" alt="" style="max-width: 450px">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Category Asset</label>
                                                                <input type="text" class="form-control" name="category_asset" value="{{$service->category_asset}}" id="first-name-icon" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail (Specification)</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5" disabled>{{$service->detail_of_specification}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="password-id-icon" value="{{$service->qty}}" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-sort-numeric-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Complainant</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="password-id-icon" value="{{$service->complainant_name}}" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Department</label>
                                                                <div class="position-relative">
                                                                    @if ($service->department_id != null)
                                                                    <input type="text" class="form-control" value="{{$service->department->name}}" id="password-id-icon" disabled>
                                                                    @else
                                                                    <input type="text" class="form-control" value="" id="password-id-icon" disabled>
                                                                    @endif

                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-window-restore"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Status</label>
                                                            <div class="position-relative mb-2">
                                                                @if ($service->status == 'Fixed')
                                                                <span class="badge bg-success">Fixed</span>
                                                                @elseif ($service->status == 'In Repair')
                                                                <span class="badge bg-warning">In Repair</span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Complain Desc</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5" disabled>{{$service->desc_complain}}</textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Diagnose</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5" disabled>{{$service->diagnose}}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date of entry</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="text" class="form-control" id="password-id-icon" value="{{$service->date}}" disabled>

                                                            </div>

                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <label for="password-id-icon">Estimated date completed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="text" class="form-control" value="{{$service->date_estimation_fixed}}" id="password-id-icon" disabled>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date Fixed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="text" class="form-control" value="{{$service->date_fixed}}" id="password-id-icon" disabled>
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

                            <!-- modal new service data -->
                            <div class="modal fade text-left" id="newData{{$service->id}}" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary">
                                            <h5 class="modal-title white" id="myModalLabel160">New Service Data
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-vertical" method="POST" action="{{route('service.update', $service->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="id" value="{{$service->id}}" class="form-control" id="first-name-icon" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" value="{{$service->name}}" class="form-control" placeholder="Asset Name" id="first-name-icon" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Category</label>
                                                                <div class="position-relative">
                                                                    <input type="hidden" name="category_id" value="{{$service->name}}" class="form-control" id="first-name-icon" readonly>
                                                                    @foreach ($categories as $cat)
                                                                    @if ($service->category_id == $cat->id)
                                                                    <input type="text" value="{{$cat->name}}" class="form-control" id="first-name-icon" readonly>
                                                                    @endif
                                                                    @endforeach
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-grid-1x2-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative">
                                                                <img class="mb-2" src="{{asset($service->image)}}" alt="" width="100">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail (Specification)*</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="detail_of_specification" id="" rows="5" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity*</label>
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
                                                                <label for="password-id-icon">Complainant</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="complainant_name" class="form-control" placeholder="Complainant Name" id="password-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Department of Complainant</label>
                                                            <div class="position-relative mb-2">
                                                                <select class="select2 form-select" name="department_id" style="width: 100%;">
                                                                    @foreach ($departments as $dep)
                                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Status</label>
                                                            <div class="position-relative mb-2">
                                                                <span class="badge bg-warning">In Repair</span>
                                                                <input type="hidden" name="status" value="In Repair">
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Complain Desc</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="desc_complain" id="" rows="5"></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date of entry*</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" name="date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <label for="password-id-icon">Estimated date completed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" name="date_estimation_fixed" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Cancel</span>
                                            </button>
                                            <button type="submit" class="btn btn-secondary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Add</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal repair --}}
                            <div class="modal fade text-left" id="repairData{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title white" id="myModalLabel160">Repair Unit
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-vertical" action="/service/{{$service->id}}/repair" method="POST">
                                                @csrf
                                                <input type="hidden" name="asset_id" value="{{$service->id}}">
                                                <input type="hidden" name="department_id" value="{{$service->department_id}}">
                                                <input type="hidden" name="complainant_name" value="{{$service->complainant_name}}">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" value="{{$service->name}}" id="first-name-icon" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative">
                                                                <img class="mb-2" src="{{asset($service->image)}}" alt="" width="100">
                                                                <!-- <input class="form-control" name="image" type="file" id="formFile"> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Complain Desc</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="desc_complain" id="" rows="5" readonly>{{$service->desc_complain}}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Diagnose</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="diagnose" id="" rows="5"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date Repaired</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" name="date_fixed" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-dark" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Cancel</span>
                                            </button>
                                            <button type="submit" class="btn btn-dark ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Fix</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade text-left" id="logData{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title white" id="myModalLabel160">Log Repairing Unit
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form form-vertical" action="">
                                                <input type="hidden" name="id" value="{{$service->id}}">
                                                <input type="hidden" name="asset_id" value="{{$service->id}}">
                                                <input type="hidden" name="department_id" value="{{$service->department_id}}">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" placeholder="Asset Name" value="{{$service->id}}" id="first-name-icon" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-key-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" placeholder="Asset Name" value="{{$service->name}}" id="first-name-icon" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="first-name-icon">Log Repairing</label>
                                                            <ul class="list-group">
                                                                @foreach ($logs as $log)
                                                                @if ($log->asset_id == $service->id)
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col-12 logs">
                                                                            <div class="btn col-12 text-start ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLog{{$log->id}}" aria-expanded="false" aria-controls="collapseLog">
                                                                                <span class="bi bi-caret-right-fill"></span> {{$log->date_fixed}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="collapse" id="collapseLog{{$log->id}}">
                                                                                <div class="card card-body">
                                                                                    <a><b>Complainant:</b><br>{{$log->complainant_name}}<br>
                                                                                        <b>Complainant Department:</b><br>{{$log->department->name}}<br>
                                                                                        <b>Complaint Desc:</b><br>{{$log->desc_complain}}<br>
                                                                                        <b>Diagnose:</b><br>{{$log->diagnose}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">OK</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            </div>
            </tr>
            @endif
            @endforeach
            </tbody>
            </table>
        </div>
</div>

</section>
<!-- Basic Tables end -->
</div>
@endsection