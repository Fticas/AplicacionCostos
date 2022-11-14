<?php

namespace App\Http\Controllers;

use App\Models\ReporteVentas;
use App\Http\Requests\StoreReporteVentasRequest;
use App\Http\Requests\UpdateReporteVentasRequest;
use Illuminate\Support\Facades\DB;
use PDF;


class ReporteVentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas=[];
        return view('reportes.reporteventas',compact('ventas'));
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
     * @param  \App\Http\Requests\StoreReporteVentasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReporteVentasRequest $request)
    {
        $ordenesVentas = DB::select("select DATE_FORMAT(fecha_entrega, '%m-%Y') as 'mes', productos.nombre as producto, sum(ordenes_producto.cantidad) as ventas, sum(ordenes_producto.precio) as subtotal 
from pedidos,ordenes_producto, productos 
WHERE pedidos.id = ordenes_producto.producto_id AND ordenes_producto.producto_id = productos.id 
group by mes,producto WITH ROLLUP");
        $fecha_inicio = date('m-Y',strtotime($request->fecha_inicio));
        $fecha_final = date('m-Y',strtotime($request->fecha_final));
        $ventas =[];
        $total = 0;
        foreach ($ordenesVentas as $elemento)
            if ($elemento->mes == NULL or $elemento->mes >= $fecha_inicio  &&  
                $elemento->mes <= $fecha_final ){ 
                $ventas[] = $elemento;
                 if($elemento->producto!=NULL){
                    $total +=$elemento->subtotal;
                }
            }
        foreach ($ventas as $elemento){
            if($elemento->mes ==NULl){
                    $elemento->subtotal = $total;
                }
        }
        
        if (sizeof($ventas)==1){
            $vacio = [];
            $ventas = $vacio;
        }
        return view('reportes.reporteventas', compact('ventas', 'fecha_inicio','fecha_final'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReporteVentas  $reporteVentas
     * @return \Illuminate\Http\Response
     */
    public function show(ReporteVentas $reporteVentas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteVentas  $reporteVentas
     * @return \Illuminate\Http\Response
     */
    public function edit(ReporteVentas $reporteVentas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReporteVentasRequest  $request
     * @param  \App\Models\ReporteVentas  $reporteVentas
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReporteVentasRequest $request, $id)
    {
        $ordenesVentas = DB::select("select DATE_FORMAT(fecha_entrega, '%m-%Y') as 'mes', productos.nombre as producto, sum(ordenes_producto.cantidad) as ventas, sum(ordenes_producto.precio) as subtotal 
from pedidos,ordenes_producto, productos 
WHERE pedidos.id = ordenes_producto.producto_id AND ordenes_producto.producto_id = productos.id 
group by mes,producto WITH ROLLUP");
        $fecha_inicio = $request->fecha_inicio;
        $fecha_final = $request->fecha_final;
        $ventas =[];
        $total = 0;
        foreach ($ordenesVentas as $elemento)
            if ($elemento->mes == NULL or $elemento->mes >= $fecha_inicio  &&  
                $elemento->mes <= $fecha_final ){ 
                $ventas[] = $elemento;
                 if($elemento->producto!=NULL){
                    $total +=$elemento->subtotal;
                }
            }
        foreach ($ventas as $elemento){
            if($elemento->mes ==NULl){
                    $elemento->subtotal = $total;
                }
        }
        
        if (sizeof($ventas)==1){
            $vacio = [];
            $ventas = $vacio;
        }
        $pdf = PDF::loadView('reportes/reporteventasPDF', compact('ventas', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('reporte_ventas.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReporteVentas  $reporteVentas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReporteVentas $reporteVentas)
    {
        //
    }
}
