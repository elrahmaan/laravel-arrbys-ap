<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use App\Models\Department;
use App\Models\ServiceAsset;
use App\Models\UnitLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceAssetController extends Controller
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

        $departments = Department::all();
        $categories = AssetCategory::all();
        $services = ServiceAsset::latest()->whereYear('date', $current_year)->get()->sortBy('status', SORT_REGULAR, true);
        // $services = ServiceAsset::orderBy('status', 'desc')->get();
        // $services = ServiceAsset::all()->sortBy('name');
        $now = Carbon::now()->format('Y-m-d');
        $logs = UnitLog::all();
        $countData = DB::table('service_assets')->count();
        if ($countData > 0) {
            // $years = DB::table("service_assets")
            //     ->selectRaw("DISTINCT year(date) AS year")
            //     ->orderByRaw('year ASC')
            //     ->get();

            //pgsql
            $years = DB::table("service_assets")
                ->selectRaw("DISTINCT EXTRACT (YEAR FROM date) AS YEAR")
                ->orderByRaw('YEAR ASC')
                ->get();
        } else {
            $years = $current_year;
        }
        return view('service-asset.service', compact(
            'departments',
            'services',
            'categories',
            'logs',
            'now',
            'current_year',
            'countData',
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
        $asset = new ServiceAsset();
        $code = DB::table('service_assets')->where('id', 'LIKE',  '%' . Carbon::parse(date($request->date))->format('dmY') . '%')->count();
        $asset->id = Carbon::parse(date($request->date))->format('dmY') . ($code + 1);
        $asset->name = $request->name;
        $asset->category_id = $request->category_id;
        if ($request->file('image')) {
            $image = $request->image;
            $file_name =  time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/uploads/service-assets/');
            $image->move($path, $file_name);
            $image_data = '/uploads/service-assets/' . $file_name;
            $asset->image = $image_data;
        }

        $asset->category_asset = $request->category_asset;
        $asset->detail_of_specification = $request->detail_of_specification;
        $asset->qty = $request->qty;
        $asset->complainant_name = $request->complainant_name;
        $asset->department_id = $request->department_id;
        $asset->status = $request->status;
        $asset->desc_complain = $request->desc_complain;
        $asset->diagnose = $request->diagnose;
        $asset->date = $request->date;

        $asset->save();

        return redirect()->route('service.index')->with('success', 'Data Added!');;
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
        $asset = ServiceAsset::find($id);
        $image = $request->file('image');
        if ($image != null) {
            if ($asset->image != "") {
                $file_path = $asset->image;
                File::delete(public_path($file_path));
                // unlink($file_path);
            }
            $file_name =  time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/uploads/service-assets/');
            File::makeDirectory($path, $mode = 0777, true, true);
            $image->move($path, $file_name);
            $image_data = '/uploads/service-assets/' . $file_name;
            $asset->image = $image_data;
        }
        $asset->category_asset = $request->category_asset;
        $asset->detail_of_specification = $request->detail_of_specification;
        $asset->qty = $request->qty;
        $asset->complainant_name = $request->complainant_name;
        $asset->department_id = $request->department_id;
        $asset->status = $request->status;
        $asset->desc_complain = $request->desc_complain;
        $asset->date = $request->date;
        $asset->save();

        return redirect()->route('service.index')->with('success', 'Data Edited!');;
    }

    public function repair(Request $request, $id)
    {
        if ($request->date_fixed < $request->date_entry) {
            Alert::error('Error', 'Invalid Parameter Date !');
            return redirect()->route('service.index');
        } else {
            $asset = ServiceAsset::find($id);
            $asset->status = 'Fixed';
            $asset->diagnose = $request->diagnose;
            $asset->date_fixed = $request->date_fixed;
            $asset->save();


            $log = new UnitLog();
            $log->asset_id = $request->asset_id;
            $log->complainant_name = $request->complainant_name;
            $log->department_id = $request->department_id;
            $log->desc_complain = $request->desc_complain;
            $log->diagnose = $request->diagnose;
            $log->date_fixed = $request->date_fixed;
            $log->save();

            return redirect()->route('service.index')->with('success', 'Asset Fixed!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServiceAsset::find($id);
        if ($service->image != null) {
            $file_path =  $service->eform;
            File::delete(public_path($file_path));
            // unlink($file_path);
        }
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Data Deleted!');;
    }
}
