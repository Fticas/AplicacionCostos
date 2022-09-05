@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablaproveedor")
</div>

<div class="form-group row">
    <form action="{{Route('crear_proveedor')}}">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" style="float: right; margin: 15px; box-shadow: 1px -1px 10px 1px;">Agregar Nuevo Proveedor</button>
        </div>
    </form>
</div>

@endsection