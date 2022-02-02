@extends('master')
@section('title', 'AP1 Series | Loans')
@section('body')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
<script src="assets/vendors/jquery/jquery.min.js"></script>
<!-- <script src="assets/vendors/choices.js/choices.min.js"></script>
<script src="assets/js/pages/form-element-select.js"></script> -->
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="assets/vendors/choices.js/choices.min.js"></script>
<script src="assets/js/pages/form-element-select.js"></script> -->
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    $(document).ready(function() {
        $('.select2-multiple').select2({
            placeholder: "Choose the assets"
        });
    });
</script>

<!-- Sweet Alert Delete -->
<script>
    $('.deleted').click(function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        Swal.fire({
            title: 'Are you sure?',
            text: "Want to delete this data (" + id + ")",
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
                window.location = "/loan/delete/" + id
            }
        })
    })
</script>
<!-- End Sweet Alert Delete -->
@endsection
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Loan</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Loan</li>
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
            <div class="modal fade text-left" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                            <form action="{{ route('loan.store') }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Name*</label>
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Department*</label>
                                                <select class="form-select select2" name="department_id" required style="width:100%;">
                                                    @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">
                                                        {{ $department->name }}
                                                    </option>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-window-restore"></i>
                                                    </div>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Phone (Extension)</label>
                                                <div class="position-relative">
                                                    <input type="number" placeholder="Phone (Extension)" name="phone" class="form-control" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-telephone-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Approved By*</label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Approver name" name="approved_by" class="form-control" id="mobile-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Assets Name*</label>
                                                <div class="position-relative">
                                                    <div class="form-group">
                                                        <select class="select2-multiple form-select " multiple="multiple" name="serials[]" style="width:100%;">
                                                            @foreach ($serials as $serial)
                                                            @if ($serial->is_borrowed == false)
                                                            <option value="{{$serial->id}}">{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Purpose</label>
                                                <div class="position-relative">
                                                    <input type="text" placeholder="Purpose" name="purpose" class="form-control" id="mobile-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-stickies-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="mobile-id-icon">Detail Loan</label>
                                            <div class="position-relative">
                                                <textarea class="form-control" name="detail_loan" id="" rows="5" required> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Loan Date*</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" required name="loan_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Estimation Return Date*</label>
                                            <div class="position-relative mb-2">
                                                <input required type="datetime-local" name="estimation_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Status</label>
                                            <div class="position-relative mb-2">
                                                <span class="badge bg-warning">In Loan</span>
                                                <input type="hidden" name="status" value="In Loan">
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
                            <th>Name</th>
                            <th>Department</th>
                            <th>Approved By</th>
                            <th>Date</th>
                            <th>Return</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr class="align-content-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->name }}
                                @if ($carbon > $data->estimation_return_date || $data->real_return_date >
                                $data->estimation_return_date)
                                <span class="badge bg-danger">Late</span>
                                @endif
                            </td>
                            <td>{{ $data->department->name }}</td>
                            <td>{{ $data->approved_by }}</td>
                            <td>{{ $data->loan_date }}</td>
                            <td>
                                {{ $data->real_return_date != null ? $data->real_return_date : '-' }}
                            </td>
                            <td>

                                @if ($carbon <= $data->estimation_return_date && $data->real_return_date !== null)
                                    <span class="badge bg-success">Return</span>
                                    <input type="hidden" name="update_status" id="" value="Return">
                                    @elseif($data->real_return_date !== null && $carbon >
                                    $data->estimation_return_date)
                                    <span class="badge bg-success">Return</span>
                                    <input type="hidden" name="update_status" id="" value="Return">
                                    @else
                                    <span class="badge bg-warning">In Loan</span>
                                    <input type="hidden" name="update_status" id="" value="In Loan">
                                    @endif
                            <td class="d-flex">
                                <a href="#"><button type="button" class="btn btn-primary me-1 mb-2" data-bs-toggle="modal" data-bs-target="#showData{{ $data->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                @if ($data->status != 'Return')
                                <a href="#"><button type="button" class="btn btn-warning mb-2 me-1" data-bs-toggle="modal" data-bs-target="#editData{{ $data->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#returnData{{ $data->id }}">
                                        <i class="fa fa-arrow-circle-down"></i>
                                    </button>
                                </a>
                                @endif
                                <a href="#"><button type="button" class="btn btn-danger deleted" data-id="{{$data->id}}" data-name="{{$data->name}}"> <i class="fa fa-trash-alt"></i></button></a>
                            </td>

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
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Name</label>
                                                            <div class="position-relative">
                                                                <input disabled type="text" value="{{ $data->name }}" class="form-control" required>
                                                                <div class="form-control-icon">
                                                                    <i class="fa fa-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Department</label>
                                                            <div class="position-relative">
                                                                <input disabled type="text" value="{{ $data->department->name }}" class="form-control" required>
                                                                <div class="form-control-icon">
                                                                    <i class="fa fa-window-restore"></i>
                                                                </div>
                                                            </div>
                                                            <!-- <input type="text" value="{{$data->department->name}}" readonly> -->
                                                            <!-- <select disabled class="select2 form-select " name="department_id" required style="width:100%;">
                                                                @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}" {{ $department->id === $data->department_id ? ' selected' : ' ' }}>
                                                                    {{ $department->name }}
                                                                </option>
                                                                @endforeach
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password-id-icon">Phone (Extension)</label>
                                                            <div class="position-relative">
                                                                <input type="number" value="{{ $data->phone }}" class="form-control" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-telephone-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Approved By</label>
                                                            <div class="position-relative">
                                                                <input type="text" value="{{ $data->approved_by }}" class="form-control" id="mobile-id-icon" disabled>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-check-circle-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="mobile-id-icon">Asset Name</label>
                                                        <div class="position-relative mb-2">
                                                            @foreach ($loanAssets as $loanAsset)
                                                            @foreach ($serials as $serial)
                                                            @if ($loanAsset->loan_id == $data->id && $loanAsset->serial_id == $serial->id)
                                                            <input type="text" class="form-control" disabled value="{{$serial->asset->name}} | SN: {{$serial->no_serial}}">
                                                            @endif
                                                            @endforeach
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="mobile-id-icon">Purpose</label>
                                                        <div class="position-relative mb-2">
                                                            <textarea class="form-control" disabled>{{ $data->purpose }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="mobile-id-icon">Detail Loan</label>
                                                        <div class="position-relative mb-2">
                                                            <textarea class="form-control" disabled>{{ $data->detail_loan }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password-id-icon">Loan Date*</label>
                                                        <div class="position-relative mb-2">
                                                            <input disabled type="text" disabled value="{{ $data->loan_date }}" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password-id-icon">Estimation Return
                                                            Date*</label>
                                                        <div class="position-relative mb-2">
                                                            <input disabled type="text" value="{{ $data->estimation_return_date }}" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                                        </div>
                                                    </div>
                                                    @if ($data->real_return_date !== null)
                                                    <div class="col-12">
                                                        <label for="password-id-icon">Real Return
                                                            Date*</label>
                                                        <div class="position-relative mb-2">
                                                            <input readonly required type="text" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password-id-icon">Reason (For Late)</label>
                                                        <div class="position-relative mb-2">
                                                            <textarea disabled class="form-control" name="reason" id="" rows="5" required>{{ $data->reason }}</textarea>
                                                        </div>

                                                    </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <label for="password-id-icon">Status</label>
                                                        <div class="position-relative mb-2">
                                                            @if ($data->status == 'Return')
                                                            <span class="badge bg-success">Return</span>
                                                            @elseif ($data->status == 'In Loan')
                                                            <span class="badge bg-warning">In Loan</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">OK</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- modal return loan data -->
                            <div class="modal fade text-left" id="returnData{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title white" id="myModalLabel160">Return Loan
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/loan/{{$data->id}}/returned" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Name*</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ $data->name }}" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Department*</label>
                                                                <select class="select2 form-select " name="department_id" required style="width:100%;">
                                                                    @foreach ($departments as $department)
                                                                    <option value="{{ $department->id }}" {{ $department->id === $data->department_id ? ' selected' : ' ' }}>
                                                                        {{ $department->name }}
                                                                    </option>
                                                                    {{-- <option value="{{ $department->name }}">{{ $department->name }}
                                                                    </option> --}}
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                        <select class="" multiple="multiple" name="serials[]" hidden>
                                                            @foreach ($serials as $serial)
                                                            <option value="{{$serial->id}}" @foreach ($loanAssets as $loanAsset) @if ($loanAsset->serial_id == $serial->id && $loanAsset->loan_id == $data->id)
                                                                selected
                                                                @endif
                                                                @endforeach>{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Phone (Extension)</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="phone" placeholder="Phone (Extension)" class="form-control" required value="{{ $data->phone }}" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-telephone-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Approved By</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="approved_by" placeholder="Approver Name" class="form-control" id="mobile-id-icon" required value="{{ $data->approved_by }}" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-check-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Category</label>
                                                                <select class="select2 form-select" name="category_asset" required style="width:100%;">
                                                                    <option value="AP" {{ $data->category_asset == 'AP' ? ' selected' : '' }}>
                                                                        AP</option>
                                                                    <option value="Sewa" {{ $data->category_asset == 'Sewa' ? ' selected' : '' }}>
                                                                        Sewa</option>
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Assets Name*</label>
                                                                <div class="position-relative">
                                                                    <div class="form-group">
                                                                        <select class="select2-multiple form-select" multiple="multiple" name="serials[]" style="width:100%;" required>
                                                                            @foreach ($serials as $serial)
                                                                            @if ($serial->is_borrowed == false)
                                                                            <option value="{{$serial->id}}">{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                                            @endif
                                                                            @endforeach

                                                                            @foreach ($serials as $serial)
                                                                            @foreach ($loanAssets as $loanAsset)
                                                                            @if ($loanAsset->serial_id == $serial->id && $loanAsset->loan_id == $data->id)
                                                                            <option value="{{$serial->id}}" selected>{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                                            @endif
                                                                            @endforeach
                                                                            @endforeach
                                                                        </select>
                                                                        <select class="" multiple="multiple" name="old_serials[]" hidden>
                                                                            @foreach ($serials as $serial)
                                                                            <option value="{{$serial->id}}" @foreach ($loanAssets as $loanAsset) @if ($loanAsset->serial_id == $serial->id && $loanAsset->loan_id == $data->id)
                                                                                selected
                                                                                @endif
                                                                                @endforeach>{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Purpose</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ $data->purpose }}" name="purpose" class="form-control" id="mobile-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-stickies-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="col-12">
                                                            <label for="mobile-id-icon">Detail Loan</label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control" name="detail_loan" id="" rows="5" required> {{ $data->detail_loan }}</textarea>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Loan Date</label>
                                                            <div class="position-relative mb-2">
                                                                <input readonly type="text" value="{{ $data->loan_date }}" name="loan_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Estimation Return
                                                                Date</label>
                                                            <div class="position-relative mb-2">
                                                                <input readonly type="text" value="{{ $data->estimation_return_date }}" name="estimation_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required readonly>

                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Approved By (For Return)</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="approved_by_return" placeholder="Approver Name" class="form-control" id="mobile-id-icon" required value="{{ $data->approved_by_return }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-check-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Real Return Date*</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>
                                                            </div>
                                                            <!-- @if ($data->real_return_date !== null)
                                                            <div class="position-relative mb-2">
                                                                <input readonly required type="text" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                            @else
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                            @endif -->
                                                        </div>
                                                        @if ($carbon > $data->estimation_return_date)
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Reason (For Late)</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="reason" id="" rows="5">{{ $data->reason }}</textarea>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Status</label>
                                                            <div class="position-relative mb-2">
                                                                <span class="badge bg-warning">In Loan</span>
                                                                <input type="hidden" name="status" value="{{ $data->status }}">
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
                                            <button type="submit" class="btn btn-dark ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Update</span>
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
                                            <form action="{{ route('loan.update', $data->id) }}" class="form form-vertical" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Name*</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ $data->name }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Department*</label>
                                                                <select class="select2 form-select " name="department_id" required style="width:100%;">
                                                                    @foreach ($departments as $department)
                                                                    <option value="{{ $department->id }}" {{ $department->id === $data->department_id ? ' selected' : ' ' }}>
                                                                        {{ $department->name }}
                                                                    </option>
                                                                    {{-- <option value="{{ $department->name }}">{{ $department->name }}
                                                                    </option> --}}
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Phone (Extension)</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="phone" placeholder="Phone (Extension)" class="form-control" required value="{{ $data->phone }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-telephone-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Approved By*</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="approved_by" placeholder="Approver Name" class="form-control" id="mobile-id-icon" required value="{{ $data->approved_by }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-check-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Category</label>
                                                                <select class="select2 form-select" name="category_asset" required style="width:100%;">
                                                                    <option value="AP" {{ $data->category_asset == 'AP' ? ' selected' : '' }}>
                                                                        AP</option>
                                                                    <option value="Sewa" {{ $data->category_asset == 'Sewa' ? ' selected' : '' }}>
                                                                        Sewa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Assets Name*</label>
                                                                <div class="position-relative">
                                                                    <div class="form-group">
                                                                        <select class="select2-multiple form-select" multiple="multiple" name="serials[]" style="width:100%;" required>
                                                                            @foreach ($serials as $serial)
                                                                            @if ($serial->is_borrowed == false)
                                                                            <option value="{{$serial->id}}">{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                                            @endif
                                                                            @endforeach

                                                                            @foreach ($serials as $serial)
                                                                            @foreach ($loanAssets as $loanAsset)
                                                                            @if ($loanAsset->serial_id == $serial->id && $loanAsset->loan_id == $data->id)
                                                                            <option value="{{$serial->id}}" selected>{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                                            @endif
                                                                            @endforeach
                                                                            @endforeach
                                                                        </select>
                                                                        <select class="" multiple="multiple" name="old_serials[]" hidden>
                                                                            @foreach ($serials as $serial)
                                                                            <option value="{{$serial->id}}" @foreach ($loanAssets as $loanAsset) @if ($loanAsset->serial_id == $serial->id && $loanAsset->loan_id == $data->id)
                                                                                selected
                                                                                @endif
                                                                                @endforeach>{{$serial->asset->name}} | SN: {{$serial->no_serial}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Purpose</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ $data->purpose }}" name="purpose" class="form-control" id="mobile-id-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-stickies-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail Loan</label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control" name="detail_loan" id="" rows="5" required> {{ $data->detail_loan }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Loan Date*</label>
                                                            <div class="position-relative mb-2">
                                                                <input readonly type="text" value="{{ $data->loan_date }}" name="loan_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Estimation Return
                                                                Date</label>
                                                            <div class="position-relative mb-2">
                                                                <input readonly type="text" value="{{ $data->estimation_return_date }}" name="estimation_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <label for="password-id-icon">Real Return Date*</label>
                                                            @if ($data->real_return_date !== null)
                                                            <div class="position-relative mb-2">
                                                                <input readonly required type="text" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                            @else
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                            @endif
                                                        </div>
                                                        @if ($carbon > $data->estimation_return_date)
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Reason (For Late)</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="reason" id="" rows="5">{{ $data->reason }}</textarea>
                                                            </div>
                                                        </div>
                                                        @endif -->
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Status</label>
                                                            <div class="position-relative mb-2">
                                                                <span class="badge bg-warning">In Loan</span>
                                                                <input type="hidden" name="status" value="{{ $data->status }}">
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
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>
@endsection