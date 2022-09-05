@extends("layout.plantilla")

@section("contenido")
@if (session('registro_borrado'))
    <div class="alert alert-success alert-dismissible fade show borrar" role="alert">
        {{session('registro_borrado')}}
    </div>
@endif

@if (session('registro_actualizado'))
    <div  class="alert alert-success alert-dismissible fade show actualizar" role="alert">
        {{session('registro_actualizado')}}
    </div>
@endif      

<div>
    @include("layout.tablaunidadmedida")
</div>
<br>
<div class="form-group row" style="background: transparent;margin: auto; margin-top: -16px; border: 1px solid black;">
    <form action="{{Route('crear_unidad_medida')}}">
            <button type="submit" class="btn btn-primary" id ="boton">Agregar Unidad de Medida</button> 
    </form>
    <form action="{{route('ver_magnitud')}}">
       
            <button type="submit" class="btn btn-primary" style = "float: right;margin: 15px;box-shadow: 1px -1px 10px 1px;">Ver Magnitudes Fisicas</button> 
    </form>
</div>

@endsection
    
