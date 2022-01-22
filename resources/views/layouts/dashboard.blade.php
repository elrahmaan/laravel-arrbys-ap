@extends('master')
@section('body')
@section('title', 'AP1 Series | Dashboard')
@section('css')

@endsection
@section('script')
<script src="assets/vendors/dayjs/dayjs.min.js"></script>
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

<script>
    var lineOptions = {
        chart: {
            type: "line",
        },
        series: [{
                name: "Repair",
                data: [
                    '{{$service_1}}', '{{$service_2}}', '{{$service_3}}', '{{$service_4}}', '{{$service_5}}', '{{$service_6}}', '{{$service_7}}', '{{$service_8}}', '{{$service_9}}', '{{$service_10}}', '{{$service_11}}', '{{$service_12}}'
                ],
            },
            {
                name: "Loan",
                data: [
                    '{{$loan_1}}', '{{$loan_2}}', '{{$loan_3}}', '{{$loan_4}}', '{{$loan_5}}', '{{$loan_6}}', '{{$loan_7}}', '{{$loan_8}}', '{{$loan_9}}', '{{$loan_10}}', '{{$loan_11}}', '{{$loan_12}}'
                ],
            },
        ],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
        },
    };
    var line = new ApexCharts(document.querySelector("#line"), lineOptions);
    line.render();
</script>
@endsection
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fa fa-wrench" style="color:#fff;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">
                                        In Repair
                                    </h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{$inrepair}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="fa fa-check-circle" style="color: #fff;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">
                                        Fixed
                                    </h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{$fixed}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fa fa-arrow-alt-circle-up" style="color:#fff;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">
                                        In Loan
                                    </h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{$inloan}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="fa fa-arrow-circle-down" style="color:#fff;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">
                                        Return (Loan)
                                    </h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{$return}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistic {{$current_year}}</h4>
                        </div>
                        <div class="card-body">
                            <div id="line"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent 3 Loan <span class="badge bg-danger">Late</span></h4>

                        </div>
                        <div class="card-body">

                            @foreach ($loan_late as $late)


                            <div class="recent-message d-flex px-4 py-3">
                                <div class="name ms-4">
                                    <h6 class="text-muted mb-1">ID: {{$late->id}}</h6>
                                    <h5 class="mb-1">{{$late->name}}
                                        {{-- <span class="badge bg-primary">{{$service->qty}}</span> --}}
                                    </h5>
                                    <p class="mb-0">{{$late->phone}}</p>
                                    <p class="mb-0">{{$late->loan_date}}</p>
                                    <p class="mb-0">Estimate to return:<br>{{$late->estimation_return_date}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Data of Loans</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Asset Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loans as $loan)
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <p class="font-bold ms-3 mb-0">
                                                        {{$loan->id}}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class="mb-0">
                                                    {{$loan->equipment}}
                                                </p>
                                            </td>
                                            <td class="col-auto">
                                                <p class="mb-0">
                                                    {{$loan->loan_date}}
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="img/wrench.png" alt="Face 1" />
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Services</h5>
                            <h6 class="text-muted mb-0">{{$logs}} log repair</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Recent 3 Service</h4>
                </div>
                <div class="card-content pb-4">
                    @if ($logs > 0)
                    @foreach ($logs_data as $log)
                    @foreach ($services as $service)
                    @if ($log->asset_id == $service->id)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h6 class="text-muted mb-1">ID: {{$service->id}}</h6>
                            <h5 class="mb-1">{{$service->name}}</h5> <span class="badge bg-primary"><strong>{{$service->qty}}</strong></span>
                            <p class="mb-0">{{$log->created_at}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                    @else
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="name ms-4">
                            <h6 class="text-muted mb-1">None</h6>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ url('/img/asset-service.png') }}" width="70" class="mb-2"><br>
                    <h6 class="mb-1">Total Trouble Asset</h6>
                    <span class="badge bg-primary"><strong>{{$inrepair + $fixed}}</strong></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ url('/img/loan2.png') }}" width="70" class="mb-2"><br>
                    <h6 class="mb-1">Total Loan Data</h6>
                    <span class="badge bg-primary"><strong>{{$inloan + $return}}</strong></span>
                </div>
            </div>
            <!-- <div id="chart-visitors-profile"></div> -->
        </div>
</div>
</div>
</section>
</div>
@endsection