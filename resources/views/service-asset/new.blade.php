@extends('master')
@section('tittle', 'Table Data Asssets')
@section('body')
@section('css')

    <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />
@endsection
@section('script')
    <script src="/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendors/choices.js/choices.min.js"></script>
    <script src="assets/js/pages/form-element-select.js"></script>
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
                    window.location = "/new/delete/" + id
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
                <h3>New Assets</h3>
                <p class="text-subtitle text-muted">Asset from AP-1 & Loan</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Monitor Assets</li>
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
                            <form class="form form-vertical" method="POST" action="{{ route('new.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Asset Name*</label>
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Asset Name" id="first-name-icon" required>
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
                                                    <select class="choices form-select" name="category_id">
                                                        @foreach ($categories as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="email-id-icon">Image</label>
                                            <div class="position-relative mb-2">
                                                <input class="form-control" name="image" type="file" id="formFile"
                                                    required>
                                                <!-- <img src="" alt=""> -->
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="mobile-id-icon">Detail (Specification)*</label>
                                            <div class="position-relative mb-2">
                                                <textarea class="form-control" name="detail_of_specification" id=""
                                                    rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Quantity*</label>
                                                <div class="position-relative">
                                                    <input type="number" name="qty" class="form-control"
                                                        placeholder="Quantity" id="password-id-icon" required>
                                                    <div class="form-control-icon">
                                                        <i class="fa fa-sort-numeric-up"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password-id-icon">Date of entry*</label>
                                            <div class="position-relative mb-2">
                                                <input type="datetime-local" name="date" class="form-control"
                                                    placeholder="Choose a date" id="password-id-icon" required>
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
                            <th>ID</th>
                            <th>Asset Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                @foreach ($categories as $cat)
                                    @if ($cat->id == $service->category_id)
                                        <td>{{ $cat->name }}</td>
                                    @endif
                                @endforeach

                                <td><img src="{{ asset($service->image) }}" alt="" style="max-height: 40px"></td>
                                <td>{{ $service->qty }}</td>
                                <td class="d-flex">
                                    <a href="#"><button type="button" class="btn btn-primary me-2"
                                            data-bs-toggle="modal" data-bs-target="#showData{{ $service->id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="#"><button type="button" class="btn btn-warning me-2"
                                            data-bs-toggle="modal" data-bs-target="#editData{{ $service->id }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <a href="#"><button type="button" class="btn btn-danger deleted"
                                            data-id="{{ $service->id }}" data-name="{{ $service->name }}"> <i
                                                class="fa fa-trash-alt"></i></button></a>
                                </td>

                                <!-- modal show data -->
                                <div class="modal fade text-left" id="showData{{ $service->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                                                    <label for="id-icon">ID</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="{{ $service->id }}"
                                                                            id="id-icon" disabled>
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
                                                                        @foreach ($categories as $cat)
                                                                            @if ($cat->id == $service->category_id)
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ $cat->name }}"
                                                                                    id="id-icon" disabled>
                                                                            @endif
                                                                        @endforeach
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
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $service->name }}"
                                                                            id="first-name-icon" disabled>
                                                                        <div class="form-control-icon">
                                                                            <i class="fa fa-box"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="email-id-icon">Image</label>
                                                                <div class="position-relative mb-2">
                                                                    <img src="{{ asset($service->image) }}" alt=""
                                                                    style="max-height: 300px">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="mobile-id-icon">Detail
                                                                    (Specification)</label>
                                                                <div class="position-relative mb-2">
                                                                    <textarea class="form-control" name="" id=""
                                                                        rows="5"
                                                                        disabled>{{ $service->detail_of_specification }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label for="password-id-icon">Quantity</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            id="password-id-icon"
                                                                            value="{{ $service->qty }}" disabled>
                                                                        <div class="form-control-icon">
                                                                            <i class="fa fa-sort-numeric-up"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="password-id-icon">Date of entry</label>
                                                                <div class="position-relative mb-2">
                                                                    <input type="text" class="form-control"
                                                                        id="password-id-icon"
                                                                        value="{{ $service->date }}" disabled>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary ml-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">OK</span>
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal edit data -->
                                <div class="modal fade text-left" id="editData{{ $service->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                                <form class="form form-vertical" method="POST"
                                                    action="{{ route('service.update', $service->id) }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label for="first-name-icon">Asset Name*</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" name="name"
                                                                            class="form-control"
                                                                            placeholder="Asset Name"
                                                                            value="{{ $service->name }}"
                                                                            id="first-name-icon" required>
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
                                                                        <select class="choices form-select"
                                                                            name="category_id">
                                                                            @foreach ($categories as $cat)
                                                                                <option value="{{ $cat->id }}"
                                                                                    {{ $service->category_id == $cat->id ? ' selected' : ' ' }}>
                                                                                    {{ $cat->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="email-id-icon">Image</label>
                                                                <div class="position-relative mb-2">
                                                                    <img class="mb-2"
                                                                        src="{{ asset($service->image) }}" alt=""
                                                                        style="max-height: 300px">
                                                                    <input class="form-control" name="image"
                                                                        type="file" id="formFile">
                                                                    <!-- <img src="" alt=""> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="mobile-id-icon">Detail
                                                                    (Specification)*</label>
                                                                <div class="position-relative mb-2">
                                                                    <textarea class="form-control"
                                                                        name="detail_of_specification" id="" rows="5"
                                                                        required> {{ $service->detail_of_specification }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label for="password-id-icon">Quantity*</label>
                                                                    <div class="position-relative">
                                                                        <input type="number" name="qty"
                                                                            class="form-control"
                                                                            placeholder="Quantity"
                                                                            value="{{ $service->qty }}"
                                                                            id="password-id-icon" required>
                                                                        <div class="form-control-icon">
                                                                            <i class="fa fa-sort-numeric-up"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="password-id-icon">Date of entry*</label>
                                                                <div class="position-relative mb-2">
                                                                    <input type="text" name="date"
                                                                        class="form-control" id="password-id-icon"
                                                                        value="{{ $service->date }}" disabled>
                                                                    <!-- <input type="datetime-local" name="date" class="form-control" placeholder="Choose a date" id="password-id-icon" value="{{ $service->created_at }}" required> -->

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
                                <div class="modal fade text-left" id="repairData" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel160" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark">
                                                <h5 class="modal-title white" id="myModalLabel160">Repair Unit
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
                                                                    <label for="first-name-icon">Asset Name</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" name="name"
                                                                            class="form-control"
                                                                            placeholder="Asset Name"
                                                                            id="first-name-icon">
                                                                        <div class="form-control-icon">
                                                                            <i class="fa fa-box"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="email-id-icon">Image</label>
                                                                <div class="position-relative mb-2">
                                                                    <input class="form-control" name="image"
                                                                        type="file" id="formFile">
                                                                    <!-- <img src="" alt=""> -->
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="mobile-id-icon">Detail
                                                                    (Specification)</label>
                                                                <div class="position-relative mb-2">
                                                                    <textarea class="form-control"
                                                                        name="detail_of_specification" id=""
                                                                        rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group has-icon-left">
                                                                    <label for="password-id-icon">Quantity</label>
                                                                    <div class="position-relative">
                                                                        <input type="password" name="qty"
                                                                            class="form-control"
                                                                            placeholder="Quantity"
                                                                            id="password-id-icon">
                                                                        <div class="form-control-icon">
                                                                            <i class="fa fa-sort-numeric-up"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="password-id-icon">Date of entry</label>
                                                                <div class="position-relative mb-2">
                                                                    <input type="datetime-local" class="form-control"
                                                                        placeholder="Choose a date"
                                                                        id="password-id-icon">

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-dark"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Cancel</span>
                                                </button>
                                                <button type="button" class="btn btn-dark ml-1"
                                                    data-bs-dismiss="modal">
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
