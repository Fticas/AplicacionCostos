@extends('layout.plantillaprincipal')

@section('contenido')


<div style="padding: 20px;">
    <div style="padding-left: 5px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('compras.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
            </a>
        </div>
    </div>
    <!--Encabezado-->
    <figcaption>
        <h5 style="text-align: center;">Informacion de compra</h5>
    </figcaption>
    <br>
    <div class="row g-3 align-items-center">
        <!--Nombre del proveedor-->
        <div class="col-md-4">
            <label class="form-label">Proveedor</label>
            <input type="text" value="{{$compra->proveedor->nombre}}" class="form-control" readonly>
        </div>
        <!--Fecha de compra-->
        <div class="col-md-3">
            <label for="" class="form-label">Fecha de compra</label>
            <input type="date" value="{{$compra->fecha_compra}}" class="form-control" readonly>
        </div>
        <!--No de factuta-->
        <div class="col-md-3">
            <label for="" class="form-label">No. de factura</label>
            <input type="text" value="{{$compra->no_factura}}" class="form-control" id="" readonly>
        </div>
    </div>
    <br>
    <div style="border-style: outset;"></div>
    <br>
    <figcaption>
        <h5 style="text-align: center;">Detalle de compra</h5>
    </figcaption>
    <br>
    @include('ordenescompras.ver')
</div>

@endsection