<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\MateriaPrima;
use App\Models\UnidadMedida;
use App\Models\Receta;
use App\Models\Producto;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $producto = Producto::find($id);
        $recetas = Receta::All();
        $materiaprima = MateriaPrima::All();
        $unidadmedida = UnidadMedida::All();
        return view('receta.ver', compact("producto", "recetas", "materiaprima", "unidadmedida"));
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
        $materiaprima = MateriaPrima::where('nombre', $request->nombre_materia_prima)->first();
        $unidadmedida = UnidadMedida::where('nombre', $request->nombre_unidad_medida)->first();
        $receta = new Receta();
        $receta->id_producto = $request->id_producto;
        $receta->id_materia_prima = $materiaprima->id;
        $receta->cantidad = $request->cantidad;
        $receta->id_unidad_medida = $unidadmedida->id;
        $receta->save();
        $producto = Producto::find($request->id_producto);
        return redirect()->route('mostrar_producto', $producto);
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
        $receta = Receta::find($id);
        $materiaprima = MateriaPrima::All();
        $unidadmedida = UnidadMedida::All();
        return view('receta.editar', compact("receta", "materiaprima", "unidadmedida"));
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
        $receta = Receta::find($id);
        $unidadmedida = UnidadMedida::where('nombre', $request->nombre_unidad_medida)->first();
        $receta->cantidad = $request->cantidad;
        $receta->id_unidad_medida = $unidadmedida->id;
        $receta->update();
        return redirect()->route('ver_receta', $receta->id_producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receta = Receta::find($id);
        $receta->delete();
        return redirect()->route('ver_receta', $receta->id_producto);
    }
}
