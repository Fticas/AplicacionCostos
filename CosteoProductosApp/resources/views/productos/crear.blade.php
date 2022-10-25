@extends('layout.plantillaprincipal')

@section('contenido')


<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('productos.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        @if(count($recetas))
        <form action="{{route('productos.store')}}" method="post"  class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingrese los datos del nuevo producto</h5>
            </div>
            <div style="border-style: outset;"></div>
            <!--Nombre del producto-->
            <div class="col-md-5">
                <label for="" class="form-label">Nombre del producto</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <br>
            <!--Seleccion de la receta-->
            <div class="col-md-5">
                <label for="" class="form-label">Recta del producto</label>
                <select name="receta" class="form-select">
                    @foreach($recetas as $receta)
                    <option>{{$receta->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <!--Descripcion del producto-->
            <div class="col-md-10">
                <label for="" class="form-label">Descripcion del nuevo producto</label>
                <textarea name="descripcion" class="form-control" rows="3">{{old('descripcion')}}</textarea>
                @error('descripcion')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <br>
            <!--Boton enviar-->
            <div class="col-5">
                <button type="submit" class="btn btn-primary">Crear Nuevo Producto</button>
            </div>
        </form>
        @else
        <div style="text-align: center">
            <br><br><br>
            <p>No se tienen recetas para poder agregar al producto nuevo que intenta crear</p>
            <a href="{{route('recetas.create')}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="top">
                Crear nueva receta
            </a>
            <br><br><br><br><br><br>
            <small>
                Cada producto debera tener una receta para elaborar el producto<br>
                Si se tienen registros de recetas creadas anteriormente, estas ya fueron asignadas a un producto
                y no pueden asignarse a otro al mismo tiempo <br>
                Si desea crear un nuevo producto primero debe tener una receta que no haya sido asignada a un producto 
            </small>
            <br><br><br>
        </div>
        @endif
    </div>
</div>

@endsection