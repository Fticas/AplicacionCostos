@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablaproducto")
</div>

<div class="form-group row">
    <form action="{{Route('crear_producto')}}">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" style="float: right; margin: 15px; box-shadow: 1px -1px 10px 1px;">Agregar Producto</button>
        </div>
    </form>
</div>

@endsection