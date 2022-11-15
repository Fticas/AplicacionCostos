@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('finalizaciones.index')}}"
                style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
            </a>
        </div>
    </div>

    <!--Formulario para actualizar las asignacion-->
    <figcaption>
        <h5 style="text-align: center;">Datos de asignacion</h5>
    </figcaption>
    <form action="{{route('asignaciones.update', $producto->id)}}" method="post" style="padding: 25px;" class="row g-3">
        @csrf
        @method('put')
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <div class="col-md-3">
            <label for="" class="form-label">Nombre del producto</label>
            <input type="text" name="horas" value="{{$producto->nombre}}" class="form-control" readonly>
        </div>
        <div class="col-md-2">
            <label for="" class="form-label">Cantidad total</label>
            <input type="text" name="horas" value="{{$producto->cantidad}}" class="form-control" readonly>
        </div>
        <div class="col-md-3">
            <label for="" class="form-label" style="color: white;">--------------------------------</label>
            <input type="submit" value="Asignar lote" class="btn btn-primary">
        </div>
    </form>
    <br>
    <div style="border-style: outset;"></div>
    @include('asignaciones.mostrar')
</div>

@endsection
