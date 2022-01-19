@extends('master')
@section('title', 'Report-Loan')
@include('components.sidebar')
@section('body')

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
                    <h4 class="card-title">Filter Report <i class="fa fa-file-pdf"></i></h4>
                </div>
                <div class="card-content">
                    <form action="{{ route('report-loan.index') }}" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-1">
                                    <label for="date">From</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <input required type="datetime-local" name="from_date"
                                                    class="form-control" placeholder="Choose a date"
                                                    id="password-id-icon">
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <label for="date">To</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <input required type="datetime-local" name="to_date"
                                                    class="form-control" placeholder="Choose a date"
                                                    id="password-id-icon" >
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <div class="dropdown  mt-4">
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
        <div class="col-md-12  buttons">
            <a href="{{ route('export') }}" class="btn btn-dark rounded-pill pl-3 pr-3">Print Report <i class="fa fa-print ml-2" ></i></a>
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
                            @if ($carbon > $loan->estimation_return_date || $loan->real_return_date > $loan->estimation_return_date)
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