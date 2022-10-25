<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRecetaMateriaPrimaRequest;
use App\Models\RecetaMateriaPrima;
use App\Models\MateriaPrima;
use App\Models\UnidadMedida;
use App\Models\Receta;

class RecetaMateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRecetaMateriaPrimaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecetaMateriaPrimaRequest $request)
    {
        $receta_materia_prima = new RecetaMateriaPrima();
        $receta_materia_prima->materia_prima_id = MateriaPrima::where('nombre', $request->materiaprima)->first()->id;
        $receta_materia_prima->cantidad = $request->cantidad;
        $receta_materia_prima->unidad_medida_id = UnidadMedida::where('nombre', $request->unidadmedida)->first()->id;
        $receta_materia_prima->asignado = false;
        $receta_materia_prima->save();
        return redirect()->route('recetas.create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecetaMateriaPrimaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecetaMateriaPrimaRequest $request, $id)
    {
        $receta_materia_prima = new RecetaMateriaPrima();
        $receta_materia_prima->receta_id = $id;
        $receta_materia_prima->materia_prima_id = MateriaPrima::where('nombre', $request->materiaprima)->first()->id;
        $receta_materia_prima->cantidad = $request->cantidad;
        $receta_materia_prima->unidad_medida_id = UnidadMedida::where('nombre', $request->unidadmedida)->first()->id;
        $receta_materia_prima->asignado = true;
        $receta_materia_prima->save();
        return redirect()->route('recetas.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resetamateriaprima = RecetaMateriaPrima::find($id);
        if($resetamateriaprima->receta_id){     //Elimina un registro recetamateriaprima asignado a una receta
            $id_receta = $resetamateriaprima->receta_id;
            $resetamateriaprima->delete();
            return redirect()->route('recetas.edit', $id_receta);
        }
        else{               //Elimina un registro recetamateriaprima no asignado a una receta
            $resetamateriaprima->delete();
            return redirect()->route('recetas.create');
        }
    }
}
