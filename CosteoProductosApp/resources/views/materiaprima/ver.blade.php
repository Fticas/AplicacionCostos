@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablamateriaprima")
</div>
<br>
<div class="form-group row">
    <form action="{{Route('crear_materia_prima')}}">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Agregar Materia Prima</button>
        </div>
    </form>
</div>

@endsection