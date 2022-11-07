<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\OrdenProducto;
use Illuminate\Http\Request;
use App\Http\Requests\StorePedidoRequest;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.ver', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        foreach ($productos as $producto){
            //Aca se calculara el precio sugerido para cada producto
            //el calculo se realizara obteniendo el costo de la materia prima y agregando un 20% de ganancia
            $producto->precio = 1;
        }
        $ordenesproducto = OrdenProducto::all()->whereNull('pedido_id');
        return view('pedidos.crear', compact('productos', 'ordenesproducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StorePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePedidoRequest $request)
    {
        $pedido = new Pedido();
        $pedido->nombre_cliente = $request->nombre;
        $pedido->fecha_realizada = date('Y/m/d');
        $pedido->fecha_entrega = $request->fecha;
        $pedido->estado = 'realizado';
        $pedido->imprevisto = 0;
        $pedido->descuento = 0;
        $pedido->save();
        
        $ordenesproducto = OrdenProducto::all()->whereNull('pedido_id');
        foreach($ordenesproducto as $ordenproducto){
            $ordenproducto->pedido_id = $pedido->id;
            $ordenproducto->save();
        }
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        $ordenesproducto = OrdenProducto::where('pedido_id', $id)->get();
        return view('pedidos.mostrar', compact('pedido', 'ordenesproducto'));
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
        //
    }
}
