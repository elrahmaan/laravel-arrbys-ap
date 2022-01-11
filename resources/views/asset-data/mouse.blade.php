@extends('master')
@section('tittle', 'Table Data Asssets')
@section('body')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
@endsection
@section('script')
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
@endsection
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Mouse Assets</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mouse Assets</li>
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
                            <form class="form form-vertical">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id-icon">ID</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="ID" id="id-icon" disabled>
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
                                                    <input type="text" class="form-control" placeholder="Asset Name" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="email-id-icon">Image</label>
                                            <div class="position-relative mb-2">
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="mobile-id-icon">Detail (Specification)</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Quantity</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Quantity" id="password-id-icon">
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
                                                    <input type="password" class="form-control" placeholder="Complainant Name" id="password-id-icon">
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
                                                    <input type="password" class="form-control" placeholder="Department of Complainant" id="password-id-icon">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-window-restore"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Status</label>
                                            <div class="position-relative mb-2">
                                                <span class="badge bg-success">Good</span>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Complain Desc</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Diagnose</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Date of entry</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">

                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Estimated date completed</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password-id-icon">Date Fixed</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">
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
                            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
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
                            <th>ID</th>
                            <th>Asset Name</th>
                            <th>Image</th>
                            <th>Qty</th>
                            <th>Complainant</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10111200</td>
                            <td>Laptop Asus</td>
                            <td><img src="" alt=""></td>
                            <td>5</td>
                            <td>Oni</td>
                            <td>AOB</td>
                            <td>
                                <span class="badge bg-success">Good</span>
                                <span class="badge bg-warning">In Repair</span>
                                <span class="badge bg-danger">Broken</span>
                                <span class="badge bg-info">New</span>
                            </td>
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
                                <a href="#"><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#repairData">
                                        <i class="fa fa-wrench"></i>
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
                                                                <label for="id-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="ID" id="id-icon" disabled>
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
                                                                    <input type="text" class="form-control" placeholder="Asset Name" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative mb-2">
                                                                <img src="" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail (Specification)</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" placeholder="Quantity" id="password-id-icon">
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
                                                                    <input type="password" class="form-control" placeholder="Complainant Name" id="password-id-icon">
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
                                                                    <input type="password" class="form-control" placeholder="Department of Complainant" id="password-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-window-restore"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Status</label>
                                                            <div class="position-relative mb-2">
                                                                <span class="badge bg-success">Good</span>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Complain Desc</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Diagnose</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date of entry</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">

                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Estimated date completed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date Fixed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">
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
                                                                <label for="id-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" placeholder="ID" id="id-icon" disabled>
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
                                                                    <input type="text" class="form-control" placeholder="Asset Name" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative mb-2">
                                                                <img src="" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail (Specification)</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity</label>
                                                                <div class="position-relative">
                                                                    <input type="password" class="form-control" placeholder="Quantity" id="password-id-icon">
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
                                                                    <input type="password" class="form-control" placeholder="Complainant Name" id="password-id-icon">
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
                                                                    <input type="password" class="form-control" placeholder="Department of Complainant" id="password-id-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-window-restore"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="password-id-icon">Status</label>
                                                            <div class="position-relative mb-2">
                                                                <span class="badge bg-success">Good</span>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Complain Desc</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Diagnose</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5">tes</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date of entry</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">

                                                            </div>

                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Estimated date completed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date Fixed</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="datetime-local" class="form-control" placeholder="Choose a date" id="password-id-icon">
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

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>
@endsection