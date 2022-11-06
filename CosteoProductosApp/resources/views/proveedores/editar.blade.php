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
            <!--Nombre del proveedor-->
            <div class="col-md-5">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{$proveedores->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Tipo de proveedor-->
            <div class="col-md-5">
                <label for="tipo_proveedor" class="form-label">Seleccionar tipo de proveedor: </label>
                <select name="tipo_proveedor" id="cars" class="form-select"> <!-- if para que deje como selected el texto correspondiente. -->
                    <option>{{$proveedores->tipo_proveedor}}</option>
                    @switch($proveedores->tipo_proveedor)
                        @case('Equipos')
                        <option>Materias Primas</option>
                        <option>Equipos y Materias Primas</option>
                        <option>Servicios</option>
                        @break
                        @case('Materias Primas')
                        <option>Equipos</option>
                        <option>Equipos y Materias Primas</option>
                        <option>Servicios</option>
                        @break
                        @case('Equipos y Materias Primas')
                        <option>Equipos</option>
                        <option>Materias Primas</option>
                        <option>Servicios</option>
                        @break
                        @case('Servicios')
                        <option>Equipos</option>
                        <option>Materias Primas</option>
                        <option>Equipos y Materias Primas</option>
                        @break
                        @default
                        <option>Equipos</option>
                        <option>Materias Primas</option>
                        <option>Equipos y Materias Primas</option>
                        <option>Servicios</option>
                    @endswitch
                </select>
                @error('tipo_proveedor')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Descripcion del proveedor-->
            <div class="col-md-10">
                <label for="descripcion" class="form-label">descripcion</label>
                <input type="text" name="descripcion" value="{{$proveedores->descripcion}}" class="form-control" >
                @error('descripcion')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Boton Actualizar-->
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection