@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('unidadesmedida.show', $unidad_medida->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('unidadesmedida.update', $unidad_medida)}}" method="POST" class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Edite los campos que desea modificar</h5>
                <br>
            </div>
            <!--Id de la unidad de medida-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Id</label>
                <input type="text" value="{{$unidad_medida->id}}" class="form-control" readonly>
            </div>
            <!--Nombre de la unidad de medida-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{$unidad_medida->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            
            <!--Simbolo de la unidad de medida-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Simbolo</label>
                <input type="text" name="simbolo" value="{{$unidad_medida->simbolo}}" class="form-control" >
                @error('simbolo')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Magnitud de la unidad de medida-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Magnitud</label>
                <input type="text" value="{{$unidad_medida->magnitud->nombre}}" class="form-control" readonly>
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