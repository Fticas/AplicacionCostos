@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('proveedores.index', $proveedores->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('proveedores.update', $proveedores)}}" method="POST" class="row g-3" style="padding: 25px;">
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
                <input type="text" name="nombre" value="{{$proveedores->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="tipo_proveedor" class="form-label">Seleccionar tipo de proveedor: </label>
                <select name="tipo_proveedor" id="cars" class="form-select"> <!-- if para que deje como selected el texto correspondiente. -->
                    <option value ="" >Seleccione un proveedor</option>
                    <option value="Proveedor de equipo">Proveedor de Equipos</option>
                    <option value="Proveedor de materia prima">Proveedor de Materia Prima</option>
                    <option value="Proveedor de materia prima y equipo">Proveedor de Materia Prima y equipos</option>
                </select>
                @error('tipo_proveedor')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            
            
            <div class="col-md-6">
                <label for="descripcion" class="form-label">descripcion</label>
                <input type="text" name="descripcion" value="{{$proveedores->descripcion}}" class="form-control" >
                @error('descripcion')
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