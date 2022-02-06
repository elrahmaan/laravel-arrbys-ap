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
        return view('report.report-loan', compact('loan', 'carbon','found'));
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
        $filename = Carbon::now()->toFormattedDateString();
        return Excel::download(new LoanExport, 'Laporan Peminjaman Asset per-'.$filename.'.xlsx');
    }

    public function export_excel_parameter()
    {
        $fromDates = Carbon::parse(date(request('fromDate')))->format('Y-m-d');
        $toDates = Carbon::parse(date(request('toDate')))->format('Y-m-d');
        $filename1 = Carbon::parse(date(request('fromDate')))->toFormattedDateString();
        $filename2 = Carbon::parse(date(request('toDate')))->toFormattedDateString();
        return Excel::download(new LoanParameterExport($fromDates,$toDates), 'Laporan Peminjaman Asset per-'.$filename1.' - '.$filename2.'.xlsx');

    //     $spreedsheet = new Spreadsheet();
    //     $sheet = $spreedsheet->getActiveSheet();

    //     $styleArray = [
    //         'font' => [
    //             'bold' => true,
    //             'size' => 13
    //         ],
    //     ];
    //     $styleTitle = [
    //         'font' => [
    //             'bold' => true,
    //             'size' => 15
    //         ],
    //         'alignment' => [
    //             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //         ],
    //     ];
    //     $styleContent = [
    //         'font' => [
    //             'bold' => false,
    //             'size' => 12
    //         ],
    //         'alignment' => [
    //             'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
    //         ],
    //     ];
    //    $sheet->setCellValue('A1','Laporan Peminjaman Barang')->mergeCells('A1:H1')->getStyle('A1:H1')->applyFromArray($styleTitle);
    //    $sheet->getStyle('A2:H2')->applyFromArray($styleArray);
    //    $sheet->setCellValue('A2','Nama');
    //    $sheet->setCellValue('B2','Unit');
    //    $sheet->setCellValue('C2','Disetujui Oleh');
    //    $sheet->setCellValue('D2','Nama Barang');
    //    $sheet->setCellValue('E2','Kategori Barang Peminjaman');
    //    $sheet->setCellValue('F2','Tanggal Peminjaman');
    //    $sheet->setCellValue('G2','Tanggal Pengembalian');
    //    $sheet->setCellValue('H2','Status');
    //    foreach(range('A','I')as $col)
    //    {
    //        $sheet->getColumnDimension($col)->setAutoSize(true);
    //    }
    //    $cell = 3;
    //    $report = Loan::getLoanParameter($fromDates,$toDates);
    //    foreach ($report as $row) {
    //     $sheet->getStyle('A'.$cell.':'.'H'.$cell)->applyFromArray($styleContent);
    //     $sheet->setCellValue('A' . $cell, $row->name);
    //     $sheet->setCellValue('B' . $cell, $row->department_name);
    //     $sheet->setCellValue('C' . $cell, $row->approved_by);
    //     $sheet->setCellValue('D' . $cell, $row->equipment);
    //     $sheet->setCellValue('E' . $cell, $row->category_asset);
    //     $sheet->setCellValue('F' . $cell, $row->loan_date);
    //     $sheet->setCellValue('G' . $cell, $row->estimation_return_date);
    //     $sheet->setCellValue('H' . $cell, $row->status);
    //     $cell++;
    // }
    // $writer = new Xlsx($spreedsheet);
    // header('Content-Type: application/vnd.ms-excel');
    // $filename = 'loan'. '.xlsx';
    // header('Content-Disposition: attachment; filename="' . $filename . '"');
    // $writer->save('php://output');

    }
}