<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComprasRequest;
use App\Models\Compra;
use App\Models\Conversion;
use App\Models\Proveedor;
use App\Models\MateriaPrima;
use App\Models\UnidadMedida;
use App\Models\RecetaMateriaPrima;
use App\Models\OrdenCompra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::all();
        return view('compras.ver', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editable = true;
        $proveedores = Proveedor::all();
        $unidadesmedida = UnidadMedida::all();
        $materiasprimas = MateriaPrima::all();
        $ordenescompras = OrdenCompra::all()->whereNull('compra_id');
        return view('compras.crear', compact('proveedores', 'unidadesmedida', 'materiasprimas', 'ordenescompras', 'editable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComprasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComprasRequest $request)
    {
        //Crear una compra nueva
        $compra = new Compra();
        $compra->proveedor_id = Proveedor::where('nombre', $request->proveedor)->first()->id;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->no_factura = $request->no_factura;
        $compra->save();

        //Para cada orden de compra recien creada
        $compra = Compra::where('no_factura', $request->no_factura)->first();
        $ordenescompras = OrdenCompra::all()->whereNull('compra_id');
        foreach($ordenescompras as $ordencompra){
            //Vincula la orden de compra a la nueva compra
            $ordencompra->compra_id = $compra->id;
            $ordencompra->save();
            
            //Calcula el factor de conversion que se aplicara a la actualizacion de materia prima
            $factor = 1.00;
            $um_comprada = UnidadMedida::find($ordencompra->unidad_medida->id)->first();
            $um_base = UnidadMedida::find($ordencompra->materia_prima->unidadMedida->id)->first();
            if($um_comprada->id != $um_base->id){
                $lista = Conversion::where('unidad_medida_inicial_id', $um_comprada->id)->get();
                $conversion = $lista->where('unidad_medida_final_id', $um_base->id);
                $factor = $conversion[0]->factor_conversion;
                $lista = null;
                $conversion = null;
            }

            //Actualiza las unidades en existencia y el precio a la materia prima
            $materiaPrima = MateriaPrima::find($ordencompra->materia_prima->id);
            $costoNuevo = $materiaPrima->costo_total + $ordencompra->costo_total;
            $materiaPrima->costo_total = $costoNuevo;
            $cantidadNueva = $materiaPrima->cantidad_existencia + ($ordencompra->cantidad * $factor);
            $materiaPrima->cantidad_existencia = $cantidadNueva;
            $materiaPrima->save();
        }
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editable = false;
        $compra = Compra::find($id);
        $ordenescompras = OrdenCompra::where('compra_id', $id)->get();
        return view('compras.mostrar', compact('compra', 'ordenescompras', 'editable'));
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
     * @param  \App\Http\Requests\StoreComprasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComprasRequest $request, $id)
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
