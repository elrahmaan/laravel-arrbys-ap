<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Serial;
use Illuminate\Http\Request;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $qty = $request->qty;
        $asset_id = $request->asset_id;

        for ($i = 0; $i < $qty; $i++) {
            $serial = new Serial();
            $serial->no_serial = $request->no_serial[$i];
            $serial->asset_id = $asset_id;
            $serial->is_borrowed = false;
            $serial->save();
        }
        return redirect()->route('asset.index')->with('success', 'Data Added Serial Number!');
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
        $asset_id = $request->asset_id;
        $serials = Serial::where('asset_id', $id)->get();

        foreach ($serials as $serial) {
            $serial = Serial::find($serial->id);
            $serial->no_serial = $request->no_serial[$serial->id];
            $serial->asset_id = $asset_id;
            $serial->save();
        }
        return redirect()->route('asset.index')->with('success', 'Data Updated Serial Number!');;
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
