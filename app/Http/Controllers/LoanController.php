<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Loan::all();
        $departments = Department::all();
        // $cok = Department::all();
        return view('layouts.loan.index',compact('data','departments'));
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
        $loan = new Loan();
        $loan->name = $request->name;
        $loan->category_asset = $request->category_asset;
        $loan->status = $request->status;
        $loan->department_id = $request->department_id;
        $loan->approved_by = $request->approved_by;
        $loan->phone = $request->phone;
        $loan->purpose = $request->purpose;
        $loan->detail_loan = $request->detail_loan;
        $loan->loan_date = $request->loan_date;
        $loan->estimation_return_date = $request->estimation_return_date;
        $loan->real_return_date = $request->real_return_date;
        $loan->reason = $request->reason;
        $loan->equipment = $request->equipment;
        $loan->save(); 
        return redirect('/loan')->with('Added', 'Data Added');
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
        $loan = Loan::find($id);
        $loan->name = $request->name;
        $loan->category_asset = $request->category_asset;
        $loan->status = $request->status;
        $loan->department_id = $request->department_id;
        $loan->approved_by = $request->approved_by;
        $loan->phone = $request->phone;
        $loan->purpose = $request->purpose;
        $loan->detail_loan = $request->detail_loan;
        $loan->loan_date = $request->loan_date;
        $loan->estimation_return_date = $request->estimation_return_date;
        $loan->real_return_date = $request->real_return_date;
        $loan->reason = $request->reason;
        $loan->equipment = $request->equipment;
        $loan->save(); 
        return redirect('/loan')->with('Edited', 'Data Edited');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Loan::find($id)->delete();
        return redirect('/loan')->with('Deleted', 'Data Deleted');
    }
}