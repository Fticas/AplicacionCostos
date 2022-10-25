<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Receta;
use App\Models\RecetaMateriaPrima;
use App\Http\Requests\StoreProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.ver', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recetas = Receta::all();
        $recetas = $recetas->reject(function($receta){
            return $receta->asignado;
        });
        return view('productos.crear', compact('recetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $receta = Receta::where('nombre', $request->receta)->first();
        $receta->asignado = true;
        $receta->save();

        $producto = new Producto();
        $producto->receta_id = $receta->id;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->save();
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $recetasmateriasprimas = RecetaMateriaPrima::where('receta_id', $producto->receta_id)->get();
        return view('productos.mostrar', compact('producto', 'recetasmateriasprimas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $recetas = Receta::all();
        $recetas = $recetas->reject(function($receta){
            return $receta->asignado;
        });
        return view('productos.editar', compact('producto', 'recetas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductoRequest $request, $id)
    {
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        if($producto->receta->nombre != $request->receta){
            //Establecer el campo asignado de la receta actual en falso
            $producto->receta->asignado = false;
            $producto->receta->save();

            //Establecer el campo asignado de la nueva receta a verdadero
            $receta = Receta::where('nombre', $request->receta)->first();
            $receta->asignado = true;
            $receta->save();

            //Asociar el producto con la receta
            $producto->receta_id = $receta->id;
        }
        $producto->save();
        return redirect()->route('productos.show', $producto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->receta->asignado = false;
        $producto->receta->save();
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
