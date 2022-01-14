<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ServiceAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        // $monitor = ServiceAsset::where('category_id', '1');
        $services = ServiceAsset::all();
        return view('service-asset.service', compact('departments', 'services'));
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
        $asset = new ServiceAsset();
        $asset->id = time();
        $asset->name = $request->name;
        $asset->category_id = 1;
        if ($request->file('image')) {
            $image = $request->image;
            $file_name =  time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/uploads/service-assets/');
            $image->move($path, $file_name);
            $image_data = '/uploads/service-assets/' . $file_name;
            $asset->image = $image_data;
        }


        $asset->detail_of_specification = $request->detail_of_specification;
        $asset->qty = $request->qty;
        $asset->complainant_name = $request->complainant_name;
        $asset->department_id = $request->department_id;
        $asset->status = $request->status;
        $asset->desc_complain = $request->desc_complain;
        $asset->diagnose = $request->diagnose;
        $asset->date = $request->date;
        $asset->date_estimation_fixed = $request->date_estimation_fixed;

        $asset->save();

        return redirect()->route('service.index');
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
