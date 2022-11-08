<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use App\Models\OrdenCompra;
use App\Models\OrdenProducto;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAsignacionRequest;
use App\Models\Asignacion;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $ordenesproducto = OrdenProducto::where('asignado', false)->get();
        foreach ($productos as $producto) {
            $producto->cantidad = 0;
            foreach ($ordenesproducto as $ordenproducto) {
                if($producto->id == $ordenproducto->producto_id){
                    $producto->cantidad += $ordenproducto->cantidad;
                }
            }
        }
        return view('asignaciones.ver', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Madelline";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsignacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsignacionRequest $request)
    {
        $asignacion = new Asignacion();
        $asignacion->operario_id = $request->operario;
        $asignacion->horas_trabajadas = $request->horas;
        $asignacion->fecha_asignacion = $request->fecha . '-01';
        //$asignacion->anio = substr($request->fecha, 0, 4);
        $asignacion->save();
        return redirect()->route('asignaciones.show', $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $ordenesproducto = OrdenProducto::where('asignado', false)->get();
        $producto->cantidad = 0;
        foreach ($ordenesproducto as $ordenproducto) {
            if($producto->id == $ordenproducto->producto_id){
                $producto->cantidad += $ordenproducto->cantidad;
                $pedidos[] = Pedido::find($ordenproducto->pedido_id);
            }
        }
        $operarios = Operario::all();
        return view('asignaciones.crear', compact('producto', 'pedidos', 'operarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "metodo edit de AsignacionController";
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
        return "metodo update de AsignacionController";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "metodo destroy de AsignacionController";
    }
}
