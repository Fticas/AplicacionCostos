@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('pedidos.index')}}"
            style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="row g-3">
        <!--Encabezado del formulario-->
        <h5 style="text-align: center;">Detalles del pedido</h5>
        <!--Nombre del cliente-->
        <div class="col-md-2">
            <label for="" class="form-label">Nombre del cliente</label>
            <input type="text" name="nombre" value="{{$pedido->nombre_cliente}}" class="form-control" readonly>
        </div>
        <!--Fecha realizada-->
        <div class="col-2">
            <label for="" class="form-label">Fecha realizada</label>
            <input type="date" name="fecha" value="{{$pedido->fecha_realizada}}" class="form-control" readonly>
        </div>
        <!--Fecha de entrega-->
        <div class="col-2">
            <label for="" class="form-label">Fecha de entrega</label>
            <input type="date" name="fecha" value="{{$pedido->fecha_entrega}}" class="form-control" readonly>
        </div>
        <!--Estado del pedido-->
        <div class="col-2">
            <label for="" class="form-label">Estado</label>
            <input type="text" name="fecha" value="{{$pedido->estado}}" class="form-control" readonly>
        </div>
        <!--Costo imprevisto-->
        <div class="col-2">
            <label for="" class="form-label">Costo imprevisto</label>
            <input type="text" name="fecha" value="$ {{number_format($pedido->imprevisto, 2)}}" class="form-control" readonly>
        </div>
        <!--Descuento-->
        <div class="col-2">
            <label for="" class="form-label">Descuento</label>
            <input type="text" name="fecha" value="$ {{number_format($pedido->descuento, 2)}}" class="form-control" readonly>
        </div>
    </div>
    <br>
    <div style="border-style: outset;"></div>
    @include('ordenesproducto.ver')
</div>

@endsection