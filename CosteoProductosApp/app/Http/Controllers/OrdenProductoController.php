<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrdenProductoRequest;
use App\Models\OrdenCompra;
use App\Models\OrdenProducto;
use App\Models\Producto;

class OrdenProductoController extends Controller
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
     * @param  \App\Http\Requests\StoreOrdenProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdenProductoRequest $request)
    {
        $ordenproducto = new OrdenProducto();
        $ordenproducto->producto_id = Producto::where('nombre', $request->producto)->first()->id;
        $ordenproducto->cantidad = $request->cantidad;
        $ordenproducto->precio = $request->precio * $request->cantidad;
        $ordenproducto->asignado = "Ingresado";
        $ordenproducto->save();
        return redirect()->route('pedidos.create');
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
     * @param  \App\Http\Requests\StoreOrdenProductoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrdenProductoRequest $request, $id)
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
        $ordenproducto = OrdenProducto::find($id);
        $ordenproducto->delete();
        return redirect()->route('pedidos.create');
    }
}
