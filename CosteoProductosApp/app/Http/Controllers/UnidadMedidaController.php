<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use App\Models\Magnitud;
use App\Http\Controllers\ConversionController;
use App\Http\Requests\StoreUnidadMedidaRequest;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magnitudes = Magnitud::All();
        $unidades_medida = UnidadMedida::All();
        return view('unidadesmedida.ver', compact("magnitudes", "unidades_medida"));
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
     * @param  \App\Http\Requests\StoreUnidadMedidaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnidadMedidaRequest $request)
    {
        $unidad_medida = new UnidadMedida;
        $unidad_medida->magnitud_id = Magnitud::where('nombre', $request->magnitud)->first()->id;
        $unidad_medida->nombre = $request->nombre;
        $unidad_medida->simbolo = $request->simbolo;
        $unidad_medida->save();
        crearFactoresConversion($unidad_medida);
        return redirect()->route('unidadesmedida.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidad_medida = UnidadMedida::find($id);
        return view('unidadesmedida.mostrar', compact('unidad_medida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad_medida = UnidadMedida::find($id);
        $magnitud = Magnitud::All();
        return view('unidadesmedida.editar', compact("unidad_medida", "magnitud"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnidadMedidaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUnidadMedidaRequest $request, $id)
    {
        /*$unidadmedida = UnidadMedida::find($id);
        $magnitud = Magnitud::where("nombre", $request->nombre_magnitud)->first();
        $id_magnitud_anterior = $unidadmedida->id_magnitud;
        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->simbolo = $request->simbolo;
        $unidadmedida->id_magnitud = $magnitud->id;
        $unidadmedida->update();
        if($id_magnitud_anterior != $magnitud->id){
            eliminarFactoresConversion($unidadmedida);
            crearFactoresConversion($unidadmedida);
        }
        //AGREGANDO ALERTA
        return redirect()->route('ver_unidad_medida')->with('registro_actualizado', 'Unidad actualizada exitosamente');
        //AGREGANDO ALERTA*/
        $unidad_medida = UnidadMedida::find($id);
        $unidad_medida->nombre = $request->nombre;
        $unidad_medida->simbolo = $request->simbolo;
        $unidad_medida->save();
        return redirect()->route('unidadesmedida.show', $id);
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
