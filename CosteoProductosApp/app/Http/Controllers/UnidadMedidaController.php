<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida;

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
        return view('unidadmedida.ver', compact("unidadmedida", "editable"));
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
        return view("unidadmedida.crear", compact("unidadmedida", "editable"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editable = false;
        $unidadmedida = new UnidadMedida();
        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->magnitud = $request->magnitud;
        $unidadmedida->simbolo = $request->simbolo;
        $unidadmedida->save();
        //redirigir la vista al ingreso de los factores de conversion
        //return redirect()->route('crear_conversion');
        return redirect()->route('crear_unidad_medida');
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
        return view('unidadmedida.editar', compact("unidadmedida"));
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
        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->magnitud = $request->magnitud;
        $unidadmedida->simbolo = $request->simbolo;
        $unidadmedida->save();
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
        $editable = true;
        $unidadmedida = UnidadMedida::find($id);
        $unidadmedida->delete();
        return redirect()->route('ver_unidad_medida', "editable");
    }
}
