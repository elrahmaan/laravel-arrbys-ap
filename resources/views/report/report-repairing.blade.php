@extends('master')
@section('title', 'Report-Loan')
@include('components.sidebar')
@section('body')

<div class="page-title">
    <div class="row">
        <div class="col-md-6 col-12  order-md-1 order-last">
            <h3>Repairing Reports </i></h3>
            <p class="text-subtitle text-muted">Navbar will appear in top of the page.</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Repairing Reports</li>
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
                    <form action="" method="GET">
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
                                <div class="col-sm-4 mb-1">
                                    <div class="dropdown mt-4">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <div class="dropdown mt-4">
                                        <a href="{{ route('report-repairing.index') }}" class="btn btn-warning"><i
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
            <form action="{{ request('from_date') && request('to_date') ? route('export-service-parameter') : route('export-service') }}" method="GET">
                @if (request('from_date') && request('to_date'))
                <input type="hidden" name="fromDate" value="{{ request('from_date') }}">
                <input type="hidden" name="toDate" value="{{ request('to_date') }}">    
                @endif
                <button type="submit" class="btn btn-dark rounded-pill pl-3 pr-3">Print Report     
                <i class="fa fa-print ml-2"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Asset Name</th>
                        <th>Unit</th>
                        <th>Complainant Name</th>
                        <th>Desc Complain</th>
                        <th>Diagnose</th>
                        <th>Date Fixed</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $report)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $report->asset_name }}</td>
                        <td>{{ $report->department_name }}</td>
                        <td>{{ $report->complainant_name }}</td>
                        <td>{{ $report->desc_complain }}</td>
                        <td>{{ $report->diagnose }}</td>
                        <td>{{ $report->date_fixed }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
