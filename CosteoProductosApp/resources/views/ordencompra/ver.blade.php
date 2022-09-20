@extends("layout.plantilla")

@section("contenido")

<br>
<div style="border: 1px solid;">
        
    <div class="row row-cols-1" style="background:transparent" >
        
        <div class="col" style=" background: transparent;border:1px solid;margin-left:">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_compra')}}"style="margin-top: 25px;margin-bottom: 10px;"> 
                    Regresar
                </a>
            </div>
            <div class="col-sm-10" style=" background: transparent;"><h4 class = "text-center"style="background:transparent">Orden de Compra</h4><br></div>
            <div class="col-sm-10" style="background:transparent">Proveedor: {{obtenerNombreProveedor($compra->id_proveedor)}}</div>
            <div class="col-sm-10" style="background:transparent">Codigo: {{$compra->id}}</div>
            <div class="col-sm-10" style="background:transparent">Numero de factura</div>
            <div class="col-sm-10" style="background:transparent">Fecha de compra: {{$compra->fecha}}</div>
        </div>
    </div>
</div>
<div>
    @include("layout.tablaordencompra")
</div>

@endsection