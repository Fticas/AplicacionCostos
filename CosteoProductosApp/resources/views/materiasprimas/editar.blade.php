@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('materiasprimas.show', $materia_prima->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('materiasprimas.update', $materia_prima)}}" method="POST" class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Edite los campos que desea modificar</h5>
                <br>
            </div>
            <!--Id de la materia prima-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Id</label>
                <input type="text" value="{{$materia_prima->id}}" class="form-control" readonly>
            </div>
            <!--Nombre de la materia prima-->
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{$materia_prima->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Cantidad en existencia de la materia prima-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Cantidad en existencia</label>
                <input type="text" name="simbolo" value="{{$materia_prima->cantidad_existencia}}" class="form-control" readonly>
            </div>
            <!--Unidad de medida de la materia prima-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Unidad de medida</label>
                <input type="text" value="{{$materia_prima->unidadMedida->nombre}}" class="form-control" readonly>
            </div>
            <!--Costo total de la materia prima-->
            <div class="col-md-3">
                <label class="form-label">Costo total</label>
                <input type="text" value="$ {{number_format($materia_prima->costo_total, 2)}}" class="form-control" readonly>
            </div>
            <!--Boton Actualizar-->
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection