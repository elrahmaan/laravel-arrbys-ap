@extends('master')
@section('tittle', 'Table Data Loan')
@section('body')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">

@endsection
@section('script')
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>

<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
@endsection
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Loan</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Loan</li>
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
                                                <label for="first-name-icon">Name</label>
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Unit</label>
                                                <select class="form-select form-select-lg w-100" name="department_id" required>
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
                                                <label for="mobile-id-icon">Approved By</label>
                                                <div class="position-relative">
                                                    <input type="text" name="approved_by" class="form-control" id="mobile-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-pen"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Phone</label>
                                                <div class="position-relative">
                                                    <input type="number" name="phone" class="form-control" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Asset Name</label>
                                                <div class="position-relative">
                                                    <input type="text" name="equipment" class="form-control" id="mobile-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Category</label>
                                            <select class="form-select form-select-lg w-100" name="category_asset" required>
                                                <option value="AP">AP</option>
                                                <option value="Sewa">Sewa</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Purpose</label>
                                                <div class="position-relative">
                                                    <input type="text" name="purpose" class="form-control" id="mobile-id-icon" required>

                                                    <div class="form-control-icon">
                                                        <i class="bi bi-receipt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Detail Loan</label>
                                                <div class="position-relative">
                                                    <input type="text" name="detail_loan" class="form-control" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
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
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Status</label>
                                                <div class="position-relative">
                                                    <input type="text" name="status" class="form-control" id="mobile-id-icon" value="In Loan" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-receipt"></i>
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
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Approved By</th>
                            <th>Asset Name</th>
                            <th>Category Asset</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $data->name }}
                                @if ($carbon > $data->estimation_return_date || $data->real_return_date > $data->estimation_return_date)
                                <span class="badge bg-danger">Late</span>
                                @endif
                            </td>
                            <td>{{ $data->department->name }}</td>
                            <td>{{ $data->approved_by }}</td>
                            <td>{{ $data->equipment }}</td>
                            <td>{{ $data->category_asset }}</td>
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
                                <a href="#"><button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showData{{ $data->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editData{{ $data->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <form action="{{ route('loan.destroy', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteData">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
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
                                            <form class="form form-vertical">
                                                @csrf
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
                                                                <label for="mobile-id-icon">Unit</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ $data->department->name }}" class="form-control" id="mobile-id-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pen"></i>
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
                                                                        <i class="bi bi-pen"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Phone</label>
                                                                <div class="position-relative">
                                                                    <input type="number" value="{{ $data->phone }}" class="form-control" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-phone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Asset Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ $data->equipment }}" class="form-control" id="mobile-id-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Category</label>
                                                            <select class="form-select form-select-lg w-100" value="{{ $data->category_asset }}" disabled>
                                                                <option value="AP" {{ $data->category_asset == 'AP' ? ' selected' : '' }} disabled>AP</option>
                                                                <option value="Sewa" {{ $data->category_asset == 'Sewa' ? ' selected' : '' }} disabled>Sewa</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Purpose</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ $data->purpose }}" class="form-control" id="mobile-id-icon" disabled>

                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-receipt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Detail Loan</label>
                                                                <div class="position-relative">
                                                                    <input type="text" value="{{ $data->detail_loan }}" class="form-control" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
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
                                                            <label for="password-id-icon">Reason</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea disabled class="form-control" name="reason" id="" rows="5" required>{{ $data->reason }}</textarea>
                                                            </div>

                                                        </div>
                                                        @endif

                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Status</label>
                                                            <select disabled class="form-select form-select-lg w-100" name="status" required>
                                                                <option value="In Loan" {{ $data->status == 'In Loan' ? ' selected' : '' }} disabled>In Loan</option>
                                                                <option value="Return" {{ $data->status == 'Return' ? ' selected' : '' }}>
                                                                    Return</option>
                                                                <option value="Late" {{ $data->status == 'Late' ? ' selected' : '' }}>
                                                                    Late</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Back</span>
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
                                                                <label for="first-name-icon">Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" required value="{{ $data->name }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Unit</label>
                                                                <select class="form-select form-select-lg w-100" name="department_id" required>
                                                                    @foreach ($departments as $department)
                                                                    <option value="{{ $department->id }}" {{ $department->id === $data->department_id ? ' selected' : ' ' }}>
                                                                        {{ $department->name }}
                                                                    </option>
                                                                    {{-- <option value="{{ $department->name }}">{{ $department->name }}</option> --}}
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Approved By</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="approved_by" class="form-control" id="mobile-id-icon" required value="{{ $data->approved_by }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pen"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Phone</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="phone" class="form-control" required value="{{ $data->phone }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-phone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group has-icon-left">
                                                            <label for="email-id-icon">Category</label>
                                                            <select class="form-select form-select-lg w-100" name="category_asset" required>
                                                                <option value="AP" {{ $data->category_asset == 'AP' ? ' selected' : '' }}>
                                                                    AP</option>
                                                                <option value="Sewa" {{ $data->category_asset == 'Sewa' ? ' selected' : '' }}>
                                                                    Sewa</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Asset Name</label>
                                                                <div class="position-relative">
                                                                    <input readonly type="text" value="{{ $data->equipment }}" name="equipment" class="form-control" id="mobile-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-pen"></i>
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
                                                                        <i class="bi bi-receipt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Detail Loan</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="detail_loan" class="form-control" required value="{{ $data->detail_loan }}">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-user"></i>
                                                                    </div>
                                                                </div>
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
                                                                Date*</label>
                                                            <div class="position-relative mb-2">
                                                                <input readonly type="text" value="{{ $data->estimation_return_date }}" name="estimation_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Real Return Date*</label>
                                                            @if ($data->real_return_date !== null)
                                                            <div class="position-relative mb-2">
                                                                <input readonly required type="text" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                            @else
                                                            <div class="position-relative mb-2">
                                                                <input required type="datetime-local" value="{{ $data->real_return_date }}" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                            @endif

                                                        </div>
                                                        @if ($carbon > $data->estimation_return_date)
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Reason</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="reason" id="" rows="5">{{ $data->reason }}</textarea>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Status</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="mobile-id-icon" value="{{ $data->status }}" readonly>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-receipt"></i>
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
                                                <span class="d-none d-sm-block">Update</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal repair --}}
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