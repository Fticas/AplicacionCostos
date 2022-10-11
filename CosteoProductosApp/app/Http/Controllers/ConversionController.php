<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use App\Models\Conversion;
use App\Models\MAgnitud;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversiones = Conversion::All();
        $magnitudes = Magnitud::All();
        $magnitudes = $magnitudes->except(3);
        return view("conversiones.ver", compact('magnitudes', 'conversiones'));
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
     * @param  Conversion  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conversion = Conversion::find($id);
        return view("conversiones.editar", compact("conversion"));
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
        $conversion = Conversion::find($id);
        $conversion->factor_conversion = $request->factor;
        $conversion->save();
        return redirect()->route("conversiones.index");
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
