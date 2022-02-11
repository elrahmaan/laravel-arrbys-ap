<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Exports\LoanExport;
use App\Exports\LoanParameterExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ReportLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan = Loan::all();
        $carbon = Carbon::now()->toDateString();
        $fromDates = Carbon::parse(date(request('from_date')))->format('Y-m-d');
        $toDates = Carbon::parse(date(request('to_date')))->format('Y-m-d');
        $found = true;
        if (request('from_date') && request('to_date')) {
            $loan = Loan::where('loan_date', '>=', $fromDates)
                ->where('loan_date', '<=', $toDates)->get();
                $found =false;
                if ($loan->count()) {
                    $found = true;
                }else{
                    $found = false;
                }
        }
        return view('layouts.pages.report.report-loan', compact('loan', 'carbon','found'));
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
        $filename = Carbon::now()->isoFormat('MMMM YYYY');
        return Excel::download(new LoanExport, 'Laporan Peminjaman Asset '.$filename.'.xlsx');
    }

    public function export_excel_parameter()
    {
        $fromDates = Carbon::parse(date(request('fromDate')))->format('Y-m-d');
        $toDates = Carbon::parse(date(request('toDate')))->format('Y-m-d');
        $filename1 = Carbon::parse(request('fromDate'))->isoFormat('DD MMMM YYYY');
        $filename2 = Carbon::parse(request('toDate'))->isoFormat('DD MMMM YYYY');
        return Excel::download(new LoanParameterExport($fromDates,$toDates), 'Laporan Peminjaman Asset per '.$filename1.' - '.$filename2.'.xlsx');

    }
}