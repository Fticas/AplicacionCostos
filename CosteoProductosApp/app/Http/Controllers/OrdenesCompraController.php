<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrdenCompraRequest;
use App\Models\MateriaPrima;
use App\Models\OrdenCompra;
use App\Models\UnidadMedida;

class OrdenesCompraController extends Controller
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
     * @param  App\Http\Requests\StoreOrdenCompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdenCompraRequest $request)
    {
        $ordencompra = new OrdenCompra();
        $ordencompra->materia_prima_id = MateriaPrima::where('nombre', $request->materiaprima)->first()->id;
        $ordencompra->cantidad = $request->cantidad;
        $ordencompra->unidad_medida_id = UnidadMedida::where('nombre', $request->unidadmedida)->first()->id;
        $ordencompra->costo_total = $request->costo_total;
        $ordencompra->save();
        return redirect()->route('compras.create');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordencompra = OrdenCompra::find($id);
        $ordencompra->delete();
        return redirect()->route('compras.create');
    }
}
