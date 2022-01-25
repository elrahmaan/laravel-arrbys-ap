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
            $serial->save();
        }
        return redirect()->route('asset.index');
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
        // $qty = $request->qty;
        $asset_id = $request->asset_id;
        $serials = Serial::all();

        foreach ($serials as $serial) {
            if ($serial->asset_id == $id) {
                $i = 0;
                $serial = Serial::find($serial->id);
                $serial->no_serial = $request->no_serial[$i];
                $serial->asset_id = $asset_id;
                $serial->save();
            }
        }
        return redirect()->route('asset.index');
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
