<?php

namespace App\Http\Controllers;

use App\Models\Operario;
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
        $ordenesproducto = OrdenProducto::where('asignado', "Ingresado")->get();
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
        //
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
        $asignacion->producto_id = $request->producto;
        $asignacion->horas_trabajadas = $request->horas;
        $asignacion->fecha_asignacion = $request->fecha . '-01';
        $asignacion->estado = "Ingresado";
        $asignacion->save();
        return redirect()->route('asignaciones.show', $request->producto);
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
        $ordenesproducto = OrdenProducto::where('asignado', "Ingresado")->get();
        $ordenesproducto = $ordenesproducto->where('producto_id', $id);
        $producto->cantidad = 0;
        foreach ($ordenesproducto as $ordenproducto) {
            $producto->cantidad += $ordenproducto->cantidad;
        }
        $operarios = Operario::all();
        $asignaciones = Asignacion::where('producto_id', $id)->get();
        $asignaciones = $asignaciones->where('estado', "Ingresado");
        return view('asignaciones.crear', compact('producto', 'operarios', 'asignaciones'));
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
        //Cambiando el estado a las asignaciones de empleados guardadas
        $asignaciones = Asignacion::where('estado', "Ingresado")->get();
        $asignaciones = $asignaciones->where('producto_id', $id);
        foreach($asignaciones as $asignacion){
            $asignacion->estado = "En proceso";
            $asignacion->save();
        }

        //Cambiando el estado a las ordenes de productos asignadas
        $ordenesproducto = OrdenProducto::where('asignado', "Ingresado")->get();
        $ordenesproducto = $ordenesproducto->where('producto_id', $id);
        foreach($ordenesproducto as $ordenproducto){
            $ordenproducto->asignado = "En proceso";
            $ordenproducto->save();
        }

        //Actualizando el estado de los pedidos
        $pedidos = Pedido::all();
        foreach($pedidos as $pedido){
            $ordenes_productos = $pedido->ordenes_producto;
            $completado = true;     //las ordenes de producto han sido asignadas
            foreach($ordenes_productos as $orden_producto){
                if($orden_producto->asignado != "En proceso"){
                    $completado = false;
                    break;
                }   
            }
            if($completado){
                $pedido->estado = 'En proceso';
                $pedido->save();
            }
        }
        return redirect()->route('asignaciones.index');
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
