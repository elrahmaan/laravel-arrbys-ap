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
                                                    @foreach ($department as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                                                    <option value="1">AP</option>
                                                    <option value="2">Sewa</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Purpose</label>
                                                <div class="position-relative">
                                                    <input type="text" name="purpose" class="form-control" id="mobile-id-icon" required>
                                                
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-receipt"></i>
                                                    </div></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">Detail Loan</label>
                                                <div class="position-relative">
                                                    <input type="text" name="detail_loan" class="form-control" id="mobile-id-icon" required>
                                                
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-receipt"></i>
                                                    </div></div>
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
                                            <label for="password-id-icon">Real Return Date*</label>
                                            <div class="position-relative mb-2">
                                                <input required type="datetime-local" name="real_return_date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>
                                               
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Reason</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="reason" id="" rows="5" required></textarea>
                                            </div>

                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Status</label>
                                            <select class="form-select form-select-lg w-100" name="status" required>
                                                    <option value="1">Pinjam</option>
                                                    <option value="2">Kembali</option>
                                                    <option value="3">Terlambat</option>
                                            </select>
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
                            <th>Phone</th>
                            <th>Asset Name</th>
                            <th>Category Asset</th>
                            <th>Purpose</th>
                            <th>Detail Loan</th>
                            <th>Loan Date</th>
                            <th>Estimation Return Date</th>
                            <th>Real Return Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->department_id }}</td>
                            <td>{{ $data->approved_by }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->equipment }}</td>
                            <td>{{ $data->category_asset }}</td>
                            <td>{{ $data->purpose }}</td>
                            <td>{{ $data->loan_date }}</td>
                            <td>{{ $data->estimation_return_date }}</td>
                            <td>{{ $data->real_return_date }}</td>
                            <td>{{ $data->reason }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <a href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showData">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData">
                                    <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteData">
                                    <i class="fa fa-trash-alt"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- modal show data -->
                            <div class="modal fade text-left" id="showData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                                                <label for="first-name-icon">First Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">

                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Email</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Email" id="email-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-envelope"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Mobile</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-phone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Password</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" placeholder="Password" id="password-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Cancel</span>
                                            </button>
                                            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Add</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- modal edit data -->
                            <div class="modal fade text-left" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                            <form class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">First Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Input with icon left" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">

                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Email</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Email" id="email-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-envelope"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Mobile</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-phone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Password</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" placeholder="Password" id="password-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
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
                                            <button type="button" class="btn btn-warning ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Update</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal repair --}}
                            <div class="modal fade text-left" id="repairData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                            <form class="form form-vertical">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">First Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Input with icon left" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-person"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">

                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Email</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Email" id="email-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-envelope"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="mobile-id-icon">Mobile</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-phone"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Password</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" placeholder="Password" id="password-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-lock"></i>
                                                                    </div>
                                                                </div>
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
                                            <button type="button" class="btn btn-dark ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Add</span>
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