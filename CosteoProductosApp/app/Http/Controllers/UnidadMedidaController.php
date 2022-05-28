<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use App\Models\Magnitud;
use App\Http\Controllers\ConversionController;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editable = true;
        $unidadmedida = UnidadMedida::All();
        return view('unidadmedida.ver', compact("editable", "unidadmedida"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editable = false;
        $unidadmedida = UnidadMedida::All();
        $magnitud = Magnitud::All();
        return view("unidadmedida.crear", compact("editable", "unidadmedida", "magnitud"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidadmedida = new UnidadMedida();
        $magnitud = Magnitud::where("nombre", $request->nombre_magnitud)->first();
        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->id_magnitud = $magnitud->id;
        $unidadmedida->simbolo = $request->simbolo;
        $unidadmedida->save();
        return redirect()->route('crear_conversion');
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
        $unidadmedida = UnidadMedida::find($id);
        $magnitud = Magnitud::All();
        return view('unidadmedida.editar', compact("unidadmedida", "magnitud"));
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
        $unidadmedida = UnidadMedida::find($id);
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
        return redirect()->route('ver_unidad_medida');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidadmedida = UnidadMedida::find($id);
        $unidadmedida->delete();
        return redirect()->route('ver_unidad_medida');
    }
}
