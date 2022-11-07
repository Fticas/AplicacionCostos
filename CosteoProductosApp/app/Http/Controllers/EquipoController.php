<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Proveedor;
use App\Models\Equipo;
use App\Models\Depreciacion;
use App\Http\Requests\StoreEquiposRequest;
use App\Http\Requests\UpdateEquiposRequest;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $proveedores = Proveedor::All();
        $equipos = Equipo::All()->sortBy('fecha_compra_equipo');
        return view('equipos.ver', compact("equipos",'proveedores'));
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
     * @param  \App\Http\Requests\StoreEquiposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquiposRequest $request)
    {
        $equipos = new Equipo;
        $proveedor =  Proveedor::where('nombre', $request->proveedor)->first();
        $equipos->proveedor_id = $proveedor->id;
        $equipos->nombre = $request->nombre;
        $equipos->fecha_compra_equipo = $request->fecha_compra_equipo;
        $equipos->descripcion = $request->descripcion;
        $equipos->costo = $request->costo;
        $equipos->vida_util = $request->vida_util;
        $equipos->save();

        $fecha = date('y-m-01',strtotime($request->fecha_compra_equipo));
        $valor = $request->costo/$request->vida_util;
        for ($i = 0; $i<$request->vida_util;$i++){
            $depreciacion = new Depreciacion;
            $depreciacion->equipo_id = $equipos->id;
            $depreciacion->costo_id = NULL;
            $depreciacion->fecha_depreciacion=$fecha;
            $depreciacion->valor = $valor;
            $fecha = date('y-m-01',strtotime($fecha.  '1 Month'));
            $depreciacion->save();
           
        }
        return redirect()->route('equipos.index'); 
        
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
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipos = Equipo::find($id);
        $seleccionado = Proveedor::find($equipos->proveedor_id);
        $proveedores = Proveedor::All();
        return view('equipos.editar', compact("equipos",'proveedores','seleccionado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquiposRequest  $request
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEquiposRequest $request, $id)
    {
        $equipos = Equipo::find($id);
        $proveedor =  Proveedor::where('nombre', $request->proveedor)->first();
        $equipos->proveedor_id = $proveedor->id;
        $equipos->fecha_compra_equipo = $request->fecha_compra_equipo;
        $equipos->nombre = $request->nombre;
        $equipos->descripcion = $request->descripcion;
        $equipos->costo = $request->costo;
        $equipos->vida_util= $request->vida_util;
        $equipos->save();

        //borrar registros de las depreciaciones
        $depreciacion = Depreciacion::All()->where('equipo_id',$equipos->id);

        foreach($depreciacion as $depreciacion){
           Depreciacion::destroy($depreciacion->id);
        }
        
        //insertar de nuevo
        $fecha = date('y-m-01',strtotime($request->fecha_compra_equipo));
        $valor = $request->costo/$request->vida_util;
        for ($i = 0; $i<$request->vida_util;$i++){
            $depreciacion = new Depreciacion;
            $depreciacion->equipo_id = $equipos->id;
            $depreciacion->costo_id = NULL;
            $depreciacion->fecha_depreciacion=$fecha;
            $depreciacion->valor = $valor;
            $fecha = date('y-m-01',strtotime($fecha.  '1 Month'));
            $depreciacion->save();
           
        }
        return redirect()->route('equipos.index');
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

    public function calcularDepreciacionMensual(){

    }
}
