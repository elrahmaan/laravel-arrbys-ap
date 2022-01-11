@extends('master')
@section('title', 'Report-Repairing')
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 mb-1">
                                <label for="date">From</label>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-sm-4 mb-1">
                                <label for="date">To</label>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                                    <input type="text" class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-sm-4 mb-1">
                                <div class="dropdown  mt-4">
                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Assets
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Option 1</a>
                                        <a class="dropdown-item" href="#">Option 2</a>
                                        <a class="dropdown-item" href="#">Option 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12  buttons">
            <a href="#" class="btn btn-dark rounded-pill pl-3 pr-3">Print Report <i class="fa fa-print ml-2" ></i></a>
        </div>
    </div>
</section>
@endsection