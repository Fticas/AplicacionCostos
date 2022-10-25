@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('productos.update', $producto->id)}}" method="post"  class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Edite los campos que quiere modificar</h5>
            </div>
            <div style="border-style: outset;"></div>
            <!--Nombre del producto-->
            <div class="col-md-5">
                <label for="" class="form-label">Nombre del producto</label>
                <input type="text" name="nombre" value="{{$producto->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <br>
            <!--Seleccion de la receta-->
            <div class="col-md-5">
                <label for="" class="form-label">Recta del producto</label>
                <select name="receta" class="form-select">
                    <option>{{$producto->receta->nombre}}</option>
                    @foreach($recetas as $receta)
                    <option>{{$receta->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <!--Descripcion del producto-->
            <div class="col-md-10">
                <label for="" class="form-label">Descripcion del nuevo producto</label>
                <textarea name="descripcion" class="form-control" rows="3">{{$producto->descripcion}}</textarea>
                @error('descripcion')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <br>
            <!--Boton enviar-->
            <div class="col-5">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>

@endsection