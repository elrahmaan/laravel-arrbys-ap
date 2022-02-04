<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\Serial;
use App\Models\ServiceAsset;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
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
        $categories = AssetCategory::all();
        $assets = DB::table('assets')->whereYear('date', $current_year)->get();
        $serials = Serial::all();

        $year_chart_1 = Carbon::now()->isoFormat('YYYY');
        $year_chart_2 = $year_chart_1 - 1;
        $year_chart_3 = $year_chart_1 - 2;

        return view('service-asset.new', compact(
            'categories', 
            'assets',
            'serials',
            'year_chart_1',
            'year_chart_2',
            'year_chart_3',
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
        $asset = new Asset();
        $asset->id = time();
        $asset->name = $request->name;
        $asset->category_id = $request->category_id;
        if ($request->file('image')) {
            $image = $request->image;
            $file_name =  time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/uploads/service-assets/new/');
            $image->move($path, $file_name);
            $image_data = '/uploads/service-assets/new/' . $file_name;
            $asset->image = $image_data;
        }

        $asset->category_asset = $request->category_asset;
        $asset->detail_of_specification = $request->detail_of_specification;
        $asset->qty = $request->qty;
        $asset->date = $request->date;
        $asset->save();

        return redirect()->route('asset.index')->with('success', 'Data Added!');
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
        $service = Asset::find($id);
        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->category_asset = $request->category_asset;
        // dd($request->category_id);
        $service->detail_of_specification = $request->detail_of_specification;
        $service->qty = $request->qty;
        $service->date = $request->date;
        $image = $request->file('image');
        if ($image != null) {
            if ($service->image != "") {
                $file_path = $service->image;
                File::delete(public_path($file_path));
                // unlink($file_path);
            }
            $file_name =  time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/uploads/service-assets/');
            File::makeDirectory($path, $mode = 0777, true, true);
            $image->move($path, $file_name);
            $image_data = '/uploads/service-assets/' . $file_name;
            $service->image = $image_data;
        }
        // dd($service);
        $service->save();

        return redirect()->route('asset.index')->with('success', 'Data Updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Asset::find($id);
        if ($service->image != null) {
            $file_path =  $service->image;
            File::delete(public_path($file_path));
            // unlink($file_path);
        }
        $service->delete();
        return redirect()->route('asset.index')->with('success', 'Data Deleted!');;
    }
}