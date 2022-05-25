<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use App\Models\Magnitud;

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
        $magnitud = Magnitud::All();
        return view('unidadmedida.ver', compact("unidadmedida", "magnitud", "editable"));
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
        return view("unidadmedida.crear", compact("unidadmedida", "magnitud", "editable"));
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
        $magnitud = Magnitud::where("nombre", $request->magnitud)->first();
        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->magnitud_id = $magnitud->id;
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
        $magnitud = Magnitud::where("nombre", $request->magnitud)->first();
        $unidadmedida->nombre = $request->nombre;
        $unidadmedida->magnitud_id = $magnitud->id;
        $unidadmedida->simbolo = $request->simbolo;
        $unidadmedida->update();
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
