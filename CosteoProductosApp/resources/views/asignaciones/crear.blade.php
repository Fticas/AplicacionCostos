@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('asignaciones.index')}}"
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


    <!--Formulario para agregar operarios-->
    <form action="{{route('asignaciones.store')}}" method="post" style="padding: 25px;" class="row g-3">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <!--Encabezado del formulario-->
        <figcaption>
            <h5 style="text-align: center;">Asignacion</h5>
        </figcaption>
        <!--Nombre del pperario-->
        <div class="col-md-4">
            <label class="form-label">Operario</label>
            <select name="operario" id="" class="form-select">
                @foreach($operarios as $operario)
                    <option value="{{$operario->id}}">{{$operario->nombre . ' ' . $operario->apellido}}</option>
                @endforeach
            </select>
        </div>
        <!--Cantidad de horas trabajadas en la asignacion-->
        <div class="col-md-2">
            <label for="" class="form-label">Horas de trabajo</label>
            <input type="text" name="horas" value="{{old('horas')}}" class="form-control">
            @error('horas')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <!--Fecha de asignacion-->
        <div class="col-md-3">
            <label for="" class="form-label">Fecha de asignacion</label>
            <input type="month" name="fecha" value="{{old('no_factura')}}" class="form-control" id="">
            @error('fecha')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <div class="col-md-3" hidden>
            <input type="text" name="producto" value="{{$producto->id}}" class="form-control" hidden>
        </div>
        <br>
        <!--Boton guardar-->
        <div class="col-md-3">
            <label for="" class="form-label" style="color: white;">--------------------------------</label>
            <input type="submit" value="Asignar Operario" class="btn btn-primary">
        </div>
    </form>
    @include('asignaciones.mostrar')
</div>

@endsection