@extends('layouts.master.master')
@section('title', 'AP1 Series | Categories')
@section('body')
@section('css')

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
@endsection
@section('script')
<script src="/assets/vendors/jquery/jquery.min.js"></script>
<script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
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
<!-- End Sweet Alert Delete -->
@endsection
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Category Assets</h3>
                <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                            <form class="form form-vertical" method="POST" action="{{ route('category.store') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="id-icon">ID</label>
                                                <div class="position-relative">
                                                    <input type="text" name="id" class="form-control" value="{{ $id }}" id="id-icon" disabled>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-key-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Asset Category Name</label>
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control" placeholder="Asset Category Name" id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-box"></i>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td class="d-flex">
                                {{--<a href="#"><button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showData{{ $cat->id }}">
                                <i class="fa fa-eye"></i>
                                </button>
                                </a>--}}
                                <a href="#"><button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editData{{ $cat->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>

                                <a href="#"><button type="button" class="btn btn-danger deleted" data-id="{{$cat->id}}" data-name="{{$cat->name}}"> <i class="fa fa-trash-alt"></i></button></a>
                            </td>

                            <!-- modal show data -->
                            <div class="modal fade text-left" id="showData{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                                                    <input type="text" name="id" class="form-control" value="{{ $cat->id }}" id="id-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-key-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Category
                                                                    Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" value="{{ $cat->name }}" id="first-name-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
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
                            <div class="modal fade text-left" id="editData{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                            <form class="form form-vertical" method="POST" action="{{ route('category.update', $cat->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="id-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="id" class="form-control" value="{{ $cat->id }}" id="id-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-key-fill"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Category
                                                                    Name</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" value="{{ $cat->name }}" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
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