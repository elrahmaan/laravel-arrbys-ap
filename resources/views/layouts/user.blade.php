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
                <h3>Data User</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data User</li>
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
            <div class="modal fade text-left" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
                aria-hidden="true">
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
                            <form action="{{ route('user.store') }}" class="form form-vertical" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Name</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Name" id="first-name-icon">
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
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Email" id="email-id-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">

                                                <div class="form-group has-icon-left">
                                                    <label for="email-id-icon">Password</label>
                                                    <div class="position-relative">
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Password" id="email-id-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-eye-slash-fill"></i>
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
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($user as $i)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->name }}</td>
                                <td>{{ $i->email }}</td>
                                <td class="d-flex">
                                    <a href="#"><button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#showData{{ $i->id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="#"><button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#editData{{ $i->id }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('user.destroy',$i->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                    <a href="#"><button type="submit" class="btn btn-danger" data-bs-toggle="modal">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </a> 
                                </td>

                                <!-- modal show data -->
                                <div class="modal fade text-left" id="showData{{ $i->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel160" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title white" id="myModalLabel160">Detail Data
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form form-vertical">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label for="first-name-icon">Name</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $i->name }}"
                                                                            id="first-name-icon" disabled>
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
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $i->email }}" id="email-id-icon" disabled>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-envelope"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">OK</span>
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal edit data -->
                                <div class="modal fade text-left" id="editData{{ $i->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel160" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title white" id="myModalLabel160">Edit Data
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.update', $i->id) }}" class="form form-vertical" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <form class="form form-vertical">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label for="first-name-icon">Name</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" name="name" value="{{ $i->name }}" class="form-control"
                                                                            placeholder="Name"
                                                                            id="first-name-icon">
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
                                                                        <input type="text" name="email" value="{{ $i->email }}" class="form-control"
                                                                            placeholder="Email" id="email-id-icon">
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-envelope"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
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
