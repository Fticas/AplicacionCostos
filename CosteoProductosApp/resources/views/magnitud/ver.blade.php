@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablamagnitud")
</div>
<div class="form-group row">
    <form action="{{route('crear_magnitud')}}">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Agregar Magnitud</button>
        </div>
    </form>
    <a href="{{Route('ver_unidad_medida')}}">ver unidad de medida</a>
</div>

@endsection