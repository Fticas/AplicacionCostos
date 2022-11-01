@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('operarios.index', $operarios->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('operarios.update', $operarios)}}" method="POST" class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Edite los campos que desea modificar</h5>
                <br>
            </div>

            <div class="col-md-2">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{$operarios->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            
            
            <div class="col-md-2">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" value="{{$operarios->apellido}}" class="form-control" >
                @error('apellido')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="carnet" class="form-label">carnet</label>
                <input type="text" name="carnet" value="{{$operarios->carnet}}" class="form-control" >
                @error('carnet')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="precio_hora" class="form-label">Pago por hora</label>
                <input type="text" name="precio_hora" value="{{number_format($operarios->precio_hora, 2)}}" class="form-control" >
                @error('precio_hora')
                    <small style="color: red;">{{$message}}</small>
                @enderror
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