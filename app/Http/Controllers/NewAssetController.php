<?php

namespace App\Http\Controllers;

use App\Models\AssetCategory;
use App\Models\ServiceAsset;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AssetCategory::all();
        $services = DB::table('service_assets')
            ->where('status', 'New')->get();
        return view('service-asset.new', compact('services', 'categories'));
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
        $asset->category_id = $request->category_id;
        if ($request->file('image')) {
            $image = $request->image;
            $file_name =  time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/uploads/service-assets/new/');
            $image->move($path, $file_name);
            $image_data = '/uploads/service-assets/new/' . $file_name;
            $asset->image = $image_data;
        }


        $asset->detail_of_specification = $request->detail_of_specification;
        $asset->qty = $request->qty;
        $asset->status = 'New';
        $asset->date = $request->date;
        $asset->save();

        return redirect()->route('new.index')->with('success', 'Data Added!');;
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
        $service = ServiceAsset::find($id);
        if ($service->image != null) {
            $file_path =  $service->eform;
            File::delete(public_path($file_path));
            // unlink($file_path);
        }
        $service->delete();
        return redirect()->route('new.index')->with('success', 'Data Deleted!');;
    }
}
