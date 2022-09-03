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
    @include("layout.tablamagnitud")
</div>
<br>
<div class="form-group row"style="background: transparent;margin: auto; margin-top: -16px; border: 1px solid black; ">
    <form action="{{route('crear_magnitud')}}">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" id="boton_medida">Agregar Magnitud</button>
        </div>
    </form>
    <form action="{{Route('ver_unidad_medida')}}">
            <button type="submit" class="btn btn-primary" id ="boton">Unidades de medida</button> 
    </form>

</div>

@endsection