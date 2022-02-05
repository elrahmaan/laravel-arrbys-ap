<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use App\Models\Department;
use App\Models\ListPrice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ListPrice::all();
        $departments = Department::all();
        $categories = AssetCategory::all();
        $countCategory = DB::table('asset_categories')->count();
        $id = $countCategory + 1;

        $categories = AssetCategory::all();
        return view('report.lpp', compact('id', 'datas', 'categories', 'departments'));
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
        $lpp = new ListPrice();
        $lpp->category_id = $request->category_id;
        $lpp->department_id = $request->department_id;
        $lpp->year = $request->year;
        $lpp->rent_status = $request->rent_status;
        $lpp->qty = $request->qty;
        $lpp->usage_condition = ($request->usage_condition / 31) * 100;
        $lpp->unit_price = round($request->unit_price / 1.1);
        $lpp->total_price_condition = ($lpp->qty * $lpp->usage_condition * $lpp->unit_price) / 100;
        $lpp->usage_realization = ($request->usage_realization / 31) * 100;
        $lpp->total_price_realization = ($lpp->qty * $lpp->usage_realization * $lpp->unit_price) / 100;
        if ($lpp->save()) {
        return redirect()->route('lpp.index')->with('success', 'Data Added!');
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
}
