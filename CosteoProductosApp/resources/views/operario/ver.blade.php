@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablaoperario")
</div>
<div class="form-group row">
    <form action="{{Route('crear_operario')}}">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Agregar Operario</button>
        </div>
    </form>
</div>

@endsection