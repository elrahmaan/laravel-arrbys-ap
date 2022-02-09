<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\LoanAsset;
use App\Models\Serial;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('year')) {
            $current_year = request('year');
        } else {
            $current_year = Carbon::now()->isoFormat('YYYY');
        }


        $datas = Loan::latest()->whereYear('loan_date', $current_year)->get();
        $serials = Serial::all();
        $carbon = Carbon::now()->toDateString();
        $departments = Department::all();
        $loanAssets = LoanAsset::all();
        $countLoan = DB::table('loans')->count();
        if ($countLoan > 0) {
            $years = DB::table("loans")
                ->selectRaw("DISTINCT year(loan_date) year")
                ->orderByRaw('year ASC')
                ->get();
        } else {
            $years = $current_year;
        }
        return view('layouts.loan.index', compact(
            'datas',
            'departments',
            'carbon',
            'serials',
            'loanAssets',
            'current_year',
            'countLoan',
            'years'
        ));
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

        $loan_date = Carbon::parse(date($request->loan_date))->format('Y-m-d');
        $estimation_return_date = Carbon::parse(date($request->estimation_return_date))->format('Y-m-d');
        if ($estimation_return_date < $loan_date) {
            Alert::error('Error', 'Invalid Parameter Date !');
            return redirect('/loan');
        } else {
            $loan = new Loan();
            // $countLoan = DB::table('loans')->count();
            $code = DB::table('loans')->where('id', 'LIKE',  '%' . Carbon::parse(date($request->loan_date))->format('dmY') . '%')->count();
            $loan->id = Carbon::parse(date($request->loan_date))->format('dmY') . ($code + 1);

            // $id = $countLoan + 1;
            // $loan->id = $id;
            $loan->name = $request->name;
            $loan->status = $request->status;
            $loan->department_id = $request->department_id;
            $serials = $request->serials;
            $loan->approved_by = $request->approved_by;
            $loan->approved_by_return = $request->approved_by_return;
            $loan->phone = $request->phone;
            $loan->purpose = $request->purpose;
            $loan->detail_loan = $request->detail_loan;
            $loan->loan_date = $loan_date;
            $loan->estimation_return_date = $estimation_return_date;
            if ($loan->save()) {
                foreach ($serials as $serial) {
                    $loanAsset = new LoanAsset();
                    $loanAsset->loan_id = $loan->id;
                    $loanAsset->serial_id = $serial;
                    $loanAsset->save();

                    $serialData = Serial::find($serial);
                    $serialData->is_borrowed = true;
                    $serialData->save();
                }
                return redirect('/loan')->with('success', 'Data Added !');
            }
        }
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

    public function returned(Request $request, $id)
    {
        $loan = Loan::find($id);
        $loan->approved_by_return = $request->approved_by_return;
        $loan->real_return_date = $request->real_return_date;
        $loan->reason = $request->reason;
        $loan->status = 'Return';

        //set data asset setelah diedit
        $serials = $request->serials;
        foreach ($serials as $serial) {
            $serialData = Serial::find($serial);
            $serialData->is_borrowed = false;
            $serialData->save();
        }
        $loan->save();
        return redirect('/loan')->with('success', 'Loan Returned!');
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
        $loan = Loan::find($id);
        // if ($request->real_return_date === null) {
        //     $update_status = 'In Loan';
        // } else {
        //     $update_status = 'Return';
        // }

        //menghapus data peminjaman asset sebelum diedit
        $old_serials = $request->old_serials;
        // dd($old_serials);
        foreach ($old_serials as $old_serial) {
            $serialData = Serial::find($old_serial);
            $serialData->is_borrowed = false;
            $serialData->save();
        }
        DB::table('loan_assets')->where('loan_id', $id)->delete();

        //set data asset setelah diedit
        $serials = $request->serials;
        foreach ($serials as $serial) {
            $loanAsset = new LoanAsset();
            $loanAsset->loan_id = $id;
            $loanAsset->serial_id = $serial;
            $loanAsset->save();

            $serialData = Serial::find($serial);
            if ($request->real_return_date != null) {
                $serialData->is_borrowed = false;
            } else {
                $serialData->is_borrowed = true;
            }


            $serialData->save();
        }
        $loan->name = $request->name;
        // $loan->status = $update_status;
        $loan->department_id = $request->department_id;
        $loan->approved_by = $request->approved_by;
        $loan->phone = $request->phone;
        $loan->purpose = $request->purpose;
        $loan->detail_loan = $request->detail_loan;
        $loan->loan_date = $request->loan_date;
        $loan->estimation_return_date = $request->estimation_return_date;

        $loan->save();
        // $serials = $request->serials;
        // if ($loan->save()) {
        //     foreach ($serials as $serial) {
        //         $loanAsset = new LoanAsset();
        //         $loanAsset->loan_id = $id;
        //         $loanAsset->serial_id = $serial;
        //         $loanAsset->save();
        //     }
        //     return redirect('/loan')->with('success', 'Data Added !');
        // }
        return redirect('/loan')->with('success', 'Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan_assets = DB::table('loan_assets')->where('loan_id', $id)->get();
        $loan = Loan::find($id);
        if ($loan->status != 'Return') {
            foreach ($loan_assets as $loan_asset) {
                $serialData = Serial::find($loan_asset->serial_id);
                $serialData->is_borrowed = false;
                $serialData->save();
            }
        }
        Loan::find($id)->delete();
        return redirect('/loan')->with('success', 'Data Deleted!');
    }
}
