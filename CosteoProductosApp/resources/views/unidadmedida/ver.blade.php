@extends("layout.plantilla")

@section("contenido")
@if (session('registro_borrado'))
    <div id="borrar" class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('registro_borrado')}}
    </div>
@endif

@if (session('registro_actualizado'))
    <div id="actualizar" class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('registro_actualizado')}}
    </div>
@endif      

<div>
    @include("layout.tablaunidadmedida")
</div>

<div class="form-group row" style="background: transparent;margin: auto; margin-top: -16px; border: 1px solid black;">
    <form action="{{Route('crear_unidad_medida')}}">
            <button type="submit" class="btn btn-primary" id ="boton">Agregar Unidad de Medida</button> 
    </form>
    <form action="{{route('ver_magnitud')}}">
       
            <button type="submit" class="btn btn-primary" id ="boton">Ver Magnitud</button> 
    </form>
</div>

@endsection
    
