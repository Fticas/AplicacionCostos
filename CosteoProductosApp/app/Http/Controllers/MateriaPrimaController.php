<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\MateriaPrima;
use App\Models\UnidadMedida;
use App\Models\Conversion;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editable = true;
        $materiaprima = MateriaPrima::All();
        return view('materiaprima.ver', compact("editable", "materiaprima"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editable = false;
        $materiaprima = MateriaPrima::All();
        $unidadmedida = UnidadMedida::All();
        return view('materiaprima.crear', compact("editable", "materiaprima", "unidadmedida"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materiaprima = new MateriaPrima();
        $unidadmedida = UnidadMedida::where("nombre", $request->nombre_unidadmedida)->first();
        $materiaprima->nombre = $request->nombre;
        $materiaprima->unidades_existencia = 0;
        $materiaprima->id_unidad_medida_base = $unidadmedida->id;
        $materiaprima->precio_unitario = 0.00;
        $materiaprima->save();
        return redirect()->route('crear_materia_prima');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiaprima = MateriaPrima::find($id);
        $unidadmedida = UnidadMedida::All();
        return view("materiaprima.mostrar", compact("materiaprima", "unidadmedida"));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $materiaprima = MateriaPrima::find($id);
        $unidadmedida = UnidadMedida::where("nombre", $request->nombre_unidad_medida)->first();
        if($materiaprima->id_unidad_medida_base != $unidadmedida->id)
        {
            $factor = obtenerFactorConversion($materiaprima->id_unidad_medida_base, $unidadmedida->id);
            $materiaprima->precio_unitario /= $factor;
            $materiaprima->unidades_existencia *= $factor;
            $materiaprima->id_unidad_medida_base = $unidadmedida->id;
        }
        $precio_unitario_compra = $request->preciocompra / $request->cantidad;
        $precio_nuevo = $materiaprima->unidades_existencia * $materiaprima->precio_unitario;
        $precio_nuevo += ($request->cantidad * $precio_unitario_compra);
        $materiaprima->unidades_existencia += $request->cantidad;
        $precio_nuevo /= $materiaprima->unidades_existencia;
        $materiaprima->precio_unitario = $precio_nuevo;
        $materiaprima->update();
        return redirect()->route('mostrar_materia_prima', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiaprima = MateriaPrima::find($id);
        $unidadmedida = UnidadMedida::All();
        return view("materiaprima.editar", compact("materiaprima", "unidadmedida"));
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
        $materiaprima = MateriaPrima::find($id);
        $unidadmedida = UnidadMedida::where('nombre', $request->nombre_unidad_medida)->first();
        $materiaprima->nombre = $request->nombre;
        if($materiaprima->id_unidad_medida_base != $unidadmedida->id)
        {
            $factor = obtenerFactorConversion($materiaprima->id_unidad_medida_base, $unidadmedida->id);
            $materiaprima->precio_unitario /= $factor;
            $materiaprima->unidades_existencia *= $factor;
            $materiaprima->id_unidad_medida_base = $unidadmedida->id;
        }
        $materiaprima->update();
        return redirect()->route('ver_materia_prima');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materiaprima = MateriaPrima::find($id);
        $materiaprima->delete();
        return redirect()->route('ver_materia_prima');
    }
}
