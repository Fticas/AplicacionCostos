@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablaproducto")
</div>
<div class="form-group row">
    <form action="{{Route('crear_producto')}}">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </div>
    </form>
</div>

@endsection