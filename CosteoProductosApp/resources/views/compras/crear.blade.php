@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('compras.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
            </a>
        </div>
    </div>
    <!--Formulario de nueva compra-->
    <form action="{{route('compras.store')}}" method="post" style="padding: 25px;">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <!--Encabezado del formulario-->
        <figcaption>
            <h5 style="text-align: center;">Datos de la nueva compra</h5>
        </figcaption>
        <!--Nombre del proveedor-->
        <div class="col-md-4">
            <label class="form-label">Proveedor</label>
            <select name="proveedor" id="" class="form-select">
                @foreach($proveedores as $proveedor)
                    @if($proveedor->tipo_proveedor != 'Equipos'and $proveedor->tipo_proveedor != 'Servicios')
                    <option>{{$proveedor->nombre}}</option>
                    @endif
                @endforeach
            </select>
            @error('proveedor')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <!--Fecha de compra-->
        <div class="col-md-4">
            <label for="" class="form-label">Fecha de compra</label>
            <input type="date" name="fecha_compra" value="{{old('fecha_compra')}}" class="form-control">
            @error('fecha_compra')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <!--No de factuta-->
        <div class="col-md-5">
            <label for="" class="form-label">No. de factura</label>
            <input type="text" name="no_factura" value="{{old('no_factura')}}" class="form-control" id="">
            @error('no_factura')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <br>
        <!--Boton crear receta-->
        <div class="col-md-4">
            <input type="submit" value="Crear nueva compra" class="btn btn-primary">
        </div>
    </form>
    <div style="border-style: outset;"></div>
    @include('ordenescompras.crear')
    @include('ordenescompras.ver')
</div>

@endsection