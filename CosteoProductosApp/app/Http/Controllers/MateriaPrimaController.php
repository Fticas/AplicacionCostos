<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\MateriaPrima;
use App\Models\UnidadMedida;
use App\Models\Conversion;
use App\Http\Requests\StoreMateriaPrimaRequest;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades_medida = UnidadMedida::all();
        $materias_primas = MateriaPrima::all();
        return view('materiasprimas.ver', compact('unidades_medida', 'materias_primas'));
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
     * @param  \App\Http\Requests\StoreMateriaPrimaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriaPrimaRequest $request)
    {
        $materiaprima = new MateriaPrima();
        $unidadmedida = UnidadMedida::where("nombre", $request->unidadmedida)->first();
        $materiaprima->unidad_medida_id = $unidadmedida->id;
        $materiaprima->nombre = $request->nombre;
        $materiaprima->cantidad_existencia = 0;
        $materiaprima->costo_total = 0.00;
        $materiaprima->save();
        return redirect()->route('materiasprimas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia_prima = MateriaPrima::find($id);
        return view('materiasprimas.mostrar', compact('materia_prima'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia_prima = MateriaPrima::find($id);
        return view('materiasprimas.editar', compact('materia_prima'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreMateriaPrimaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMateriaPrimaRequest $request, $id)
    {
        $materiaprima = MateriaPrima::find($id);
        $materiaprima->nombre = $request->nombre;
        $materiaprima->save();
        return redirect()->route('materiasprimas.show', $id);
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
