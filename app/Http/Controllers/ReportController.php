<?php

namespace App\Http\Controllers;

use App\Exports\AssetServiceParameterExport;
use App\Exports\AssetServiceExport;
use App\Models\UnitLog;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = UnitLog::getDataUnit();
        $fromDates = Carbon::parse(date(request('from_date')))->format('Y-m-d');
        $toDates = Carbon::parse(date(request('to_date')))->format('Y-m-d');

        if (request('from_date') && request('from_date')) {
            // $report = UnitLog::where('created_at', '>=', $fromDates)
            //     ->where('created_at', '<=', $toDates)->get();
            $report = UnitLog::getServiceParameter($fromDates,$toDates);
        }
        return view('report.report-repairing',compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function export_excel()
    {
        $filename = Carbon::now()->isoFormat('d-m-YYYY');
        return Excel::download(new AssetServiceExport, 'Laporan Perbaikan Asset '.$filename.'.xlsx');
    }
    public function export_excel_parameter()
    {
        $fromDates = Carbon::parse(date(request('fromDate')))->format('Y-m-d');
        $toDates = Carbon::parse(date(request('toDate')))->format('Y-m-d');
        $filename = Carbon::now()->isoFormat('d-m-YYYY');
        return Excel::download(new AssetServiceParameterExport($fromDates,$toDates), 'Laporan Perbaikan Asset '.$filename.'.xlsx');
    }
}