<?php

namespace App\Http\Controllers;

use App\Models\ReporteCompras;
use App\Http\Requests\StoreReporteComprasRequest;
use Illuminate\Support\Facades\DB;
use PDF;



class ReporteComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras=[];
        return view('reportes.reporteCompras',compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReporteComprasRequest $request)
    {
    
       
        $ordenesCompras = DB::select("select DATE_FORMAT(fecha_compra, '%m-%Y') as 'mes', materias_primas.nombre as materia, sum(ordenes_compra.cantidad) as compras, sum(ordenes_compra.costo_total) as subtotal 
from compras,ordenes_compra, materias_primas 
WHERE compras.id = ordenes_compra.compra_id AND ordenes_compra.materia_prima_id = materias_primas.id 
group by mes,materia WITH ROLLUP");
        $fecha_inicio = date('m-Y',strtotime($request->fecha_inicio));
        $fecha_final = date('m-Y',strtotime($request->fecha_final));
        $compras =[];
        $total = 0;
        foreach ($ordenesCompras as $elemento)
            if ($elemento->mes == NULL or $elemento->mes >= $fecha_inicio  &&  
                $elemento->mes <= $fecha_final ){ 
                $compras[] = $elemento;
                 if($elemento->materia!=NULL){
                    $total +=$elemento->subtotal;
                }
            }
        foreach ($compras as $elemento){
            if($elemento->mes ==NULl){
                    $elemento->subtotal = $total;
                }
        }
        
        if (sizeof($compras)==1){
            $vacio = [];
            $compras = $vacio;
        }
        return view('reportes.ReporteCompras', compact('compras', 'fecha_inicio','fecha_final'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReporteCompras  $reporteCompras
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReporteCompras  $reporteCompras
     * @return \Illuminate\Http\Response
     */
    public function edit(ReporteCompras $reporteCompras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReporteCompras  $reporteCompras
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReporteComprasRequest $request, $id)
    {
        $ordenesCompras = DB::select("select DATE_FORMAT(fecha_compra, '%m-%Y') as 'mes', materias_primas.nombre as materia, sum(ordenes_compra.cantidad) as compras, sum(ordenes_compra.costo_total) as subtotal 
from compras,ordenes_compra, materias_primas 
WHERE compras.id = ordenes_compra.compra_id AND ordenes_compra.materia_prima_id = materias_primas.id 
group by mes,materia WITH ROLLUP");
        $fecha_inicio = $request->fecha_inicio;
        $fecha_final = $request->fecha_final;
        $compras =[];
        $total = 0;
        foreach ($ordenesCompras as $elemento)
            if ($elemento->mes == NULL or $elemento->mes >= $fecha_inicio  &&  
                $elemento->mes <= $fecha_final ){ 
                $compras[] = $elemento;
                 if($elemento->materia!=NULL){
                    $total +=$elemento->subtotal;
                }
            }
        foreach ($compras as $elemento){
            if($elemento->mes ==NULl){
                    $elemento->subtotal = $total;
                }
        }
        
        if (sizeof($compras)==1){
            $vacio = [];
            $compras = $vacio;
        }
        
        //return view('reportes/reporteComprasPDF', compact('compras', 'fecha_inicio', 'fecha_final'));
        $pdf = PDF::loadView('reportes/reporteComprasPDF', compact('compras', 'fecha_inicio', 'fecha_final'));
        return $pdf->download('laraveltuts.pdf');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReporteCompras  $reporteCompras
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReporteCompras $reporteCompras)
    {
        //
    }
}
