<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use App\Models\Conversion;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("conversiones.ver");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadmedida = UnidadMedida::All();
        $tamanio = sizeof($unidadmedida);
        if($tamanio > 1)
        {
            $um_referencia = $unidadmedida[$tamanio-1];
            crearFactoresConversion($um_referencia);
        }
        return redirect()->route('crear_unidad_medida')->with('registro_creado', 'Unidad registrada exitosamente');
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
        return view("conversion.editar", compact("conversion"));
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
        $conversion->update();
        return redirect()->route("ver_conversion");
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
