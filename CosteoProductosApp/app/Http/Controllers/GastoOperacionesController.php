<?php

namespace App\Http\Controllers;

use App\Models\GastoOperaciones;
use App\Models\Proveedor;
use App\Http\Requests\StoreGastoOperacionesRequest;
use App\Http\Requests\UpdateGastoOperacionesRequest;

class GastoOperacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::All();
        $gastos = GastoOperaciones::All()->sortBy('fecha');
        return view('gastosoperaciones.ver', compact("gastos",'proveedores'));
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
     * @param  \App\Http\Requests\StoreGastoOperacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGastoOperacionesRequest $request)
    {
        $gasto = new GastoOperaciones;
        $proveedor =  Proveedor::where('nombre', $request->proveedor)->first();
        $gasto->proveedor_id = $proveedor->id;
        $fecha  = date('y-m-01', strtotime($request->fecha));
        $gasto->fecha=$fecha;
        $gasto->costo_id = NULL;
        $gasto->monto =$request->monto;
        $gasto->save();

        return redirect()->route('gastosoperaciones.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GastoOperaciones  $gastoOperaciones
     * @return \Illuminate\Http\Response
     */
    public function show(GastoOperaciones $gastoOperaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GastoOperaciones  $gastoOperaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gastos = GastoOperaciones::find($id);
        $seleccionado = Proveedor::find($gastos->proveedor_id);
        $proveedores = Proveedor::All();
        return view('gastosoperaciones.editar', compact("gastos",'proveedores','seleccionado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGastoOperacionesRequest  $request
     * @param  \App\Models\GastoOperaciones  $gastoOperaciones
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGastoOperacionesRequest $request, $id)
    {
        $gasto = GastoOperaciones::find($id);
        $proveedor =  Proveedor::where('nombre', $request->proveedor)->first();
        $gasto->proveedor_id = $proveedor->id;
        $fecha  = date('y-m-01', strtotime($request->fecha));
        $gasto->fecha=$fecha;
        $gasto->costo_id = NULL;
        $gasto->monto =$request->monto;
        $gasto->save();

        return redirect()->route('gastosoperaciones.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GastoOperaciones  $gastoOperaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(GastoOperaciones $gastoOperaciones)
    {
        //
    }
}
