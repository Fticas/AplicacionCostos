@extends('layout.plantillaprincipal')

@section('contenido')


<section> <!--la etiqueta section se va a quitar porque esta incluida en la plantilla principal-->
    <div style="padding: 20px;">
        <!--Informacion general-->
        <h3 class="titulos">Detalle de compra</h3>
        <div>
            <div class="container">
                <div class="row" style="font-size: medium; padding:5px;">
                    <div class="col-md-2">Fecha de compra:</div>
                    <div class="col-md-3">--/--/---</div>
                </div>
                <div class="row" style="font-size: medium; padding:5px">
                    <div class="col-md-2">Proveedor:</div>
                    <div class="col-md-3">nombre</div>
                </div>
                <div class="row" style="font-size: medium; padding:5px">
                    <div class="col-md-2">Codigo Proveedor:</div>
                    <div class="col-md-3">codigo</div>
                </div>
                <div class="row" style="font-size: medium; padding:5px">
                    <div class="col-md-2">No Factura:</div>
                    <div class="col-md-3">--------</div>
                </div>
            </div>
        </div>
        <!--Ordenes de compra-->
        @include('layout.tablas.tablaordencompra')
    </div>
</section>

@endsection