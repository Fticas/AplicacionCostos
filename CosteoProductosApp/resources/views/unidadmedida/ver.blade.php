@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablaunidadmedida")
</div>
<div class="form-group row">
    <form action="{{Route('crear_unidad_medida')}}">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Agregar Unidad de Medida</button>
        </div>
    </form>
    <a href="{{route('ver_magnitud')}}">Ver Magnitud</a>
</div>

@endsection