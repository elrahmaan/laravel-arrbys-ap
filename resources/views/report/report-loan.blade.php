@extends('master')
@section('title', 'Report-Loan')
@include('components.sidebar')
@section('body')
@section('css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.css">

<!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
<style>
    table.dataTable td {
        padding: 15px 8px;
    }

    .fontawesome-icons .the-icon svg {
        font-size: 24px;
    }
</style>

<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
@endsection
@section('script')
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

<script src="assets/js/mazer.js"></script>
@endsection

<div class="page-title">
    <div class="row">
        <div class="col-md-6 col-12  order-md-1 order-last">
            <h3>Loan Reports </i></h3>
            <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Loan Reports</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section id="input-group-size">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="margin-bottom: -20px">
                    <h4 class="card-title">Filter Report</h4>
                </div>
                <div class="card-content">
                    <form action="{{ route('report-loan.index') }}" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-1">
                                    <label for="date">From</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <input required type="datetime-local" name="from_date" class="form-control"
                                            placeholder="Choose a date" id="password-id-icon"
                                            value="{{ request('from_date') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <label for="date">To</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <input required type="datetime-local" name="to_date" class="form-control"
                                            placeholder="Choose a date" id="password-id-icon"
                                            value="{{ request('to_date') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-1 d-flex">
                                    <div class="dropdown  mt-4 me-3">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <div class="refresh mt-4">
                                        <a href="{{ route('report-loan.index') }}" class="btn btn-dark"><i
                                                class="bi bi-arrow-repeat"></i></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-12 buttons">
            <form
                action="{{ request('from_date') && request('to_date') ? route('export-loan-parameter') : route('export-loan') }}"
                method="GET">
                @if (request('from_date') && request('to_date'))
                <input type="hidden" name="fromDate" value="{{ request('from_date') }}">
                <input type="hidden" name="toDate" value="{{ request('to_date') }}">
                @endif
            </form>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header" style="margin-bottom: -20px">
                    <h4 class="card-title">Data Loan</h4>
                </div>
                <div class="ms-4 col-md-12 buttons">
                    <form action="{{ request('from_date') && request('to_date') ? route('export-loan-parameter') : route('export-loan') }}" method="GET">
                        @if (request('from_date') && request('to_date'))
                        <input type="hidden" name="fromDate" value="{{ request('from_date') }}">
                        <input type="hidden" name="toDate" value="{{ request('to_date') }}">    
                        @endif
                        <button type="submit" class="btn btn-success rounded-3 pl-3 pr-3">Print Report     
                        <i class="fa fa-print ml-2"></i></button>
                    </form>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loan as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $loan->name }}
                                    @if ($carbon > $loan->estimation_return_date || $loan->real_return_date >
                                    $loan->estimation_return_date)
                                    <span class="badge bg-danger">Late</span>
                                    @endif
                                </td>
                                <td>{{ $loan->department->name }}</td>
                                <td>{{ $loan->approved_by }}</td>
                                <td>{{ $loan->equipment }}</td>
                                <td>{{ $loan->category_asset }}</td>
                                <td>
                                    @if ($carbon <= $loan->estimation_return_date && $loan->real_return_date !== null)
                                        <span class="badge bg-success">Return</span>
                                        <input type="hidden" name="update_status" id="" value="Return">
                                        @elseif($loan->real_return_date !== null && $carbon >
                                        $loan->estimation_return_date)
                                        <span class="badge bg-success">Return</span>
                                        <input type="hidden" name="update_status" id="" value="Return">
                                        @else
                                        <span class="badge bg-warning">In Loan</span>
                                        <input type="hidden" name="update_status" id="" value="In Loan">
                                        @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection
