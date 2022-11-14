<?php

namespace App\Http\Controllers;



use App\Models\MateriaPrima;
use App\Models\UnidadMedida;
use App\Models\Receta;
use App\Models\RecetaMateriaPrima;
use App\Http\Requests\StoreRecetaRequest;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas = Receta::all();
        return view('recetas.ver', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiasprimas = MateriaPrima::all();
        $unidadesmedida = UnidadMedida::all();
        $recetasmateriasprimas = RecetaMateriaPrima::where('asignado', false)->get();
        return view('recetas.crear', compact('materiasprimas', 'unidadesmedida', 'recetasmateriasprimas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecetaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecetaRequest $request)
    {
        //Crear un registro en la tabla recetas
        $receta = new Receta();
        $receta->nombre = $request->nombre;
        $receta->descripcion = $request->descripcion;
        $receta->asignado = false;
        $receta->cantidad_producto = $request->cantidad;
        $receta->save();

        //Obtener los registros de la tabla receta_materias_primas que no tengan una receta asignada
        $registros_receta_materias_primas = RecetaMateriaPrima::where('asignado', false)->get();

        //Se asocia la receta con cada registro en la tabla receta_materias_primas
        foreach ($registros_receta_materias_primas as $receta_materia_prima) {
            $receta_materia_prima->receta_id = $receta->id;
            $receta_materia_prima->asignado = true;
            $receta_materia_prima->save();
        }
        return redirect()->route('recetas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = Receta::find($id);
        $recetasmateriasprimas = RecetaMateriaPrima::where('receta_id', $id)->get();
        return view("recetas.mostrar", compact('receta', 'recetasmateriasprimas'));
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
        $materiasprimas = MateriaPrima::all();
        $unidadesmedida = UnidadMedida::all();
        $recetasmateriasprimas = RecetaMateriaPrima::where('receta_id', $id)->get();
        return view("recetas.editar", compact('receta', 'materiasprimas', 'unidadesmedida', 'recetasmateriasprimas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecetaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecetaRequest $request, $id)
    {
        $receta = Receta::find($id);
        $receta->nombre = $request->nombre;
        $receta->descripcion = $request->descripcion;
        $receta->save();
        return redirect()->route('recetas.index', $id);
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
