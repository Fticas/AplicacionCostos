<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\OrdenProducto;
use Illuminate\Http\Request;
use App\Http\Requests\StorePedidoRequest;
use App\Models\Pedido;
use App\Models\Conversion;

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
            $producto->precio = 0;
            $recetas_materias_primas = $producto->receta->recetas_materias_primas;
            foreach($recetas_materias_primas as $receta_materia_prima){
                //cantidad de materia prima base utilizada en la receta
                $factor = 1.0;
                $um_receta = $receta_materia_prima->unidad_medida;
                $um_base = $receta_materia_prima->materia_prima->unidadMedida;
                $conversion = Conversion::encontrar($um_receta, $um_base);
                if($conversion != null){
                    $factor = $conversion->factor_conversion;
                }
                $cantidad_materia_prima_receta = $receta_materia_prima->cantidad * $factor;

                //costo unitario de materia prima
                $materia_prima = $receta_materia_prima->materia_prima;
                $costo_unitario = 0;
                if($materia_prima->cantidad_existencia != 0){
                    $costo_unitario = $materia_prima->costo_total / $materia_prima->cantidad_existencia;
                }

                //Costo de materia prima utilizada en la receta
                $producto->precio += $costo_unitario * $cantidad_materia_prima_receta;
            }
            //costo por unidad
            $producto->precio /= $producto->receta->cantidad_producto;
            $producto->precio *= 1.20;
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
        $pedido->estado = 'Ingresado';
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
