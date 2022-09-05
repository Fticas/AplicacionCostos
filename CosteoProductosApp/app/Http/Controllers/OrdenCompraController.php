<?php

namespace App\Http\Controllers;

include("funciones.php");

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\MateriaPrima;
use App\Models\OrdenCompra;
use App\Models\UnidadMedida;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $compra = Compra::find($id);
        $materiaprima = MateriaPrima::All();
        $ordencompra = OrdenCompra::All();
        $unidadmedida = UnidadMedida::All();
        
        $ordenescompara = array();
        foreach($ordencompra as $oc){
            if($oc->id_compra == $compra->id){
                $ordenescompara[] = $oc;
            }
        }
        return view('ordencompra.ver', compact("compra", "materiaprima", "ordenescompara", "unidadmedida"));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se obtiene el factor de conversion
        $factor_conversion = 1;
        $materiaprima = MateriaPrima::where('nombre', $request->nombre_materia_prima)->first();
        $unidadmedida = UnidadMedida::where('nombre', $request->nombre_unidad_medida)->first();
        if($materiaprima->id_unidad_medida_base != $unidadmedida->id){
            $factor_conversion = obtenerFactorConversion($unidadmedida->id, $materiaprima->id_unidad_medida_base);
        }
        
        //Se calcula el nuevo precio del producto
        $u_actuales = $materiaprima->unidades_existencia;
        $p_actual = $materiaprima->precio_unitario;
        $u_nuevas = $request->cantidad * $factor_conversion;
        $p_nuevo = $request->precio;
        $precio = ($u_actuales * $p_actual + $p_nuevo) / ($u_actuales + $u_nuevas);
        
        //Actualiza la informacion del producto
        $materiaprima->unidades_existencia += $u_nuevas;
        $materiaprima->precio_unitario = $precio;
        $materiaprima->update();

        //Agrega el producto a la orden de compra
        $compra = Compra::find($request->id_compra);
        $ordencompra = new OrdenCompra();
        $ordencompra->id_materia_prima = $materiaprima->id;
        $ordencompra->id_compra = $compra->id;
        $ordencompra->cantidad = $u_nuevas;
        $ordencompra->id_unidad_medida = $unidadmedida->id;
        $ordencompra->precio_total = $p_nuevo;
        $ordencompra->save();

        //actualizar el precio de la compra
        $compra->total += $p_nuevo;
        $compra->update();
        
        return redirect()->route('ver_orden_compra', $compra->id);
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
        return view('ordencompra.editar');
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
