@extends('master')
@section('title', 'AP1 Series | Assets')
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
<!-- <script src="assets/vendors/choices.js/choices.min.js"></script> -->
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
                window.location = "/asset/delete/" + id
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
                <h3>Assets</h3>
                <!-- <p class="text-subtitle text-muted">Asset from AP-1</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Assets</li>
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
                            <form class="form form-vertical" method="POST" action="{{ route('asset.store') }}" enctype="multipart/form-data">
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
                                                <div class="position-relative">
                                                    <select class="select2 form-select" name="category_id" style="width: 100%;">
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
                                                <input class="form-control" name="image" type="file" id="formFile" accept="image/*" required>
                                                <!-- <img src="" alt=""> -->
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
                                                <label for="email-id-icon">Category Asset</label>
                                                <select class="select2 form-select" name="category_asset" style="width: 100%;" required>
                                                    <option value="AP">AP</option>
                                                    <option value="Sewa">Sewa</option>
                                                </select>
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
                                            <label for="password-id-icon">Date of entry*</label>
                                            <div class="position-relative mb-2">
                                                <input type="date" name="date" class="form-control" placeholder="Choose a date" id="password-id-icon" required>
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
                            <th>Asset Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $asset->id }}</td>
                            <td>{{ $asset->name }}
                                <?php
                                $countData = DB::table('serials')->where('asset_id', $asset->id)->count();
                                ?>
                                @if ($countData > 0)
                                <span><i class="fa fa-check-circle"></i></span>
                                @endif
                            </td>
                            @foreach ($categories as $cat)
                            @if ($cat->id == $asset->category_id)
                            <td>{{ $cat->name }}</td>
                            @endif
                            @endforeach

                            <td><img src="{{ asset($asset->image) }}" alt="" style="max-height: 40px"></td>
                            <td>{{ $asset->qty }}</td>
                            <td>{{\Carbon\Carbon::parse($asset->date)->isoFormat('D MMM YYYY')}}</td>
                            <td class="d-flex">
                                <a href="#"><button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#showData{{ $asset->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editData{{ $asset->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#serialNumber{{ $asset->id }}">
                                        <i class="fa fa-barcode"></i>
                                    </button>
                                </a>
                                <a href="#"><button type="button" class="btn btn-danger deleted" data-id="{{ $asset->id }}" data-name="{{ $asset->name }}"> <i class="fa fa-trash-alt"></i></button></a>
                            </td>

                            <!-- modal show data -->
                            <div class="modal fade text-left" id="showData{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
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
                                                                    <input type="text" class="form-control" placeholder="{{ $asset->id }}" id="id-icon" disabled>
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
                                                                    @if ($cat->id == $asset->category_id)
                                                                    <input type="text" class="form-control" placeholder="{{ $cat->name }}" id="id-icon" disabled>
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
                                                                    <input type="text" class="form-control" value="{{ $asset->name }}" id="first-name-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative mb-2">
                                                                <img src="{{ asset($asset->image) }}" alt="" style="max-height: 300px">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail
                                                                (Specification)</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="" id="" rows="5" disabled>{{ $asset->detail_of_specification }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Category Asset</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" value="{{ $asset->category_asset }}" id="first-name-icon" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="bi bi-bounding-box"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity</label>
                                                                <div class="position-relative">
                                                                    <input type="text" class="form-control" id="password-id-icon" value="{{ $asset->qty }}" disabled>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-sort-numeric-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date of entry</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="text" class="form-control" id="password-id-icon" value="{{\Carbon\Carbon::parse($asset->date)->isoFormat('D MMM YYYY')}}" disabled>

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
                            <div class="modal fade text-left" id="editData{{ $asset->id }}" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">

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
                                            <form class="form form-vertical" method="POST" action="{{ route('asset.update', $asset->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Asset Name*</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="name" class="form-control" placeholder="Asset Name" value="{{ $asset->name }}" id="first-name-icon" required>
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
                                                                    <select name="category_id" class="select2 form-select" style="width: 100%;">
                                                                        @foreach ($categories as $cat)
                                                                        <option value="{{$cat->id}}" {{ $asset->category_id == $cat->id ? ' selected' : ' '}}>{{$cat->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="email-id-icon">Image</label>
                                                            <div class="position-relative mb-2">
                                                                <img class="mb-2" src="{{ asset($asset->image) }}" alt="" style="max-height: 300px">
                                                                <input class="form-control" name="image" type="file" id="formFile" accept="image/*">
                                                                <!-- <img src="" alt=""> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="mobile-id-icon">Detail
                                                                (Specification)*</label>
                                                            <div class="position-relative mb-2">
                                                                <textarea class="form-control" name="detail_of_specification" id="" rows="5" required> {{ $asset->detail_of_specification }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="email-id-icon">Category Asset</label>
                                                                <select class="select2 form-select" name="category_asset" style="width:100%;">
                                                                    <option value="AP" {{ $asset->category_asset == 'AP' ? ' selected' : '' }}>
                                                                        AP</option>
                                                                    <option value="Sewa" {{ $asset->category_asset == 'Sewa' ? ' selected' : '' }}>
                                                                        Sewa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="password-id-icon">Quantity*</label>
                                                                <div class="position-relative">
                                                                    <input type="number" name="qty" class="form-control" placeholder="Quantity" value="{{ $asset->qty }}" id="password-id-icon" readonly required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-sort-numeric-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="password-id-icon">Date of entry*</label>
                                                            <div class="position-relative mb-2">
                                                                <input type="date" name="date" class="form-control" id="password-id-icon" value="{{ $asset->date }}" readonly>
                                                                <!-- <input type="datetime-local" name="date" class="form-control" placeholder="Choose a date" id="password-id-icon" value="{{ $asset->created_at }}" required> -->

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

                            {{-- Modal Serial Number --}}
                            <div class="modal fade text-left" id="serialNumber{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                            <h5 class="modal-title white" id="myModalLabel160">Serial Number
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $countData = DB::table('serials')->where('asset_id', $asset->id)->count();
                                            ?>
                                            @if ($countData > 0)
                                            <form class="form form-vertical" method="POST" action="{{route('serial.update', $asset->id)}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="qty" value="{{$asset->qty}}">
                                                <input type="hidden" name="asset_id" value="{{$asset->id}}">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">ID</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="id" readonly value="{{ $asset->id }}" class="form-control" id="first-name-icon">
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-key"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @foreach ($serials as $serial)
                                                        <?php
                                                        $i = 0;
                                                        ?>
                                                        @if ($serial->asset_id == $asset->id)
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Serial Number @if ($serial->is_borrowed == true)
                                                                    <span class="badge bg-warning">In Loan</span>
                                                                    @endif</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="no_serial[{{$serial->id}}]" placeholder="Serial Number" value="{{$serial->no_serial}}" class="form-control" id="first-name-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-barcode"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @endif
                                                        @endforeach
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
                                        @else
                                        <form class="form form-vertical" method="POST" action="{{route('serial.store')}}">
                                            @csrf
                                            <input type="hidden" name="qty" value="{{$asset->qty}}">
                                            <input type="hidden" name="asset_id" value="{{$asset->id}}">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">ID</label>
                                                            <div class="position-relative">
                                                                <input type="text" name="id" readonly value="{{ $asset->id }}" class="form-control" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="fa fa-key"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $i = 0;
                                                    for ($i = 0; $i < $asset->qty; $i++) { ?>
                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label for="first-name-icon">Serial Number</label>
                                                                <div class="position-relative">
                                                                    <input type="text" name="no_serial[{{$i}}]" placeholder="Serial Number" class="form-control" id="first-name-icon" required>
                                                                    <div class="form-control-icon">
                                                                        <i class="fa fa-barcode"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
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
                                            <span class="d-none d-sm-block">Add</span>
                                        </button>
                                    </div>
                                    </form>
                                    @endif
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