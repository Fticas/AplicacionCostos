<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\OrdenProducto;
use App\Models\Asignacion;
use App\Models\Pedido;

class FinalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $ordenesproducto = OrdenProducto::where('asignado', "En proceso")->get();
        foreach ($productos as $producto) {
            $producto->cantidad = 0;
            foreach ($ordenesproducto as $ordenproducto) {
                if($producto->id == $ordenproducto->producto_id){
                    $producto->cantidad += $ordenproducto->cantidad;
                }
            }
        }
        return view('finasignaciones.ver', compact('productos'));
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
        $producto = Producto::find($id);
        $ordenesproducto = OrdenProducto::where('asignado', "En proceso")->get();
        $ordenesproducto = $ordenesproducto->where('producto_id', $id);
        $producto->cantidad = 0;
        foreach ($ordenesproducto as $ordenproducto) {
            $producto->cantidad += $ordenproducto->cantidad;
        }
        $asignaciones = Asignacion::where('producto_id', $id)->get();
        $asignaciones = $asignaciones->where('estado', "En proceso");
        return view('finasignaciones.mostrar', compact('producto', 'asignaciones'));
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
        //Cambiando el estado a las asignaciones de empleados guardadas
        $asignaciones = Asignacion::where('estado', "En proceso")->get();
        $asignaciones = $asignaciones->where('producto_id', $id);
        foreach($asignaciones as $asignacion){
            $asignacion->estado = "Finalizado";
            $asignacion->save();
        }

        //Cambiando el estado a las ordenes de productos asignadas
        $ordenesproducto = OrdenProducto::where('asignado', "En proceso")->get();
        $ordenesproducto = $ordenesproducto->where('producto_id', $id);
        foreach($ordenesproducto as $ordenproducto){
            $ordenproducto->asignado = "Finalizado";
            $ordenproducto->save();
        }

        //Actualizando el estado de los pedidos
        $pedidos = Pedido::all();
        foreach($pedidos as $pedido){
            $ordenes_productos = $pedido->ordenes_producto;
            $completado = true;     //las ordenes de producto han sido asignadas
            foreach($ordenes_productos as $orden_producto){
                if($orden_producto->asignado != "Finalizado"){
                    $completado = false;
                    break;
                }   
            }
            if($completado){
                $pedido->estado = 'Finalizado';
                $pedido->save();
            }
        }
        return redirect()->route('finalizaciones.index');
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
