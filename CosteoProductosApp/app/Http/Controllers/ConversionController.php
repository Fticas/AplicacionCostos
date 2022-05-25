<?php

namespace App\Http\Controllers;

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
        $conversion = Conversion::All();
        $unidadmedida = UnidadMedida::All();
        return view("conversion.ver", compact("conversion", "unidadmedida"));
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
        if($tamanio != 1)
        {
            $ultimo = $unidadmedida[$tamanio-1];
            for($i=0; $i<=$tamanio-2; $i++)
            {
                if($unidadmedida[$i]->magnitud_id == $ultimo->magnitud_id){
                    app(ConversionController::class)->store($unidadmedida[$i], $ultimo);
                    app(ConversionController::class)->store($ultimo, $unidadmedida[$i]);
                }
            }
        }
        return redirect()->route('crear_unidad_medida');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadMedida $um1, UnidadMedida $um2)
    {
        $conversion = new Conversion();
        $conversion->unidad_medida_inicial = $um1->id;
        $conversion->unidad_medida_final = $um2->id;
        $conversion->factor_conversion = 1.00;
        $conversion->save();
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
        $unidadmedida = UnidadMedida::All();
        return view("conversion.editar", compact("conversion", "unidadmedida"));
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
