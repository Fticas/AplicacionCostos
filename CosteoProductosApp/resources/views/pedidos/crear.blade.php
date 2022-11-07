@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('pedidos.index')}}"
                style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
            </a>
        </div>
    </div>
    <!--Formulario de pedidos-->
    <form action="{{route('pedidos.store')}}" method="post" class="row g-3" style="padding: 25px;">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <!--Encabezado del formulario-->
        <figcaption>
            <h5 style="text-align: center;">Realizar un nuevo pedido</h5>
        </figcaption>
        <!--Nombre del cliente-->
        <div class="col-md-4">
            <label for="" class="form-label">Nombre del cliente</label>
            <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" id="">
            @error('nombre')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <!--Fecha de entrega-->
        <div class="col-3">
            <label for="" class="form-label">Fecha de entrega</label>
            <input type="date" name="fecha" value="{{old('fecha')}}" id="" class="form-control">
            @error('fecha')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <br>
        <!--Boton crear pedido-->
        <div class="col-md-2">
            <label for="" class="form-label" style="color: white;">-</label>
            <input type="submit" value="Crear Pedido Nuevo" class="btn btn-primary">
        </div>
    </form>
    <div style="border-style: outset;"></div>
    @include('ordenesproducto.crear')
    @include('ordenesproducto.ver')
</div>

@endsection
