@extends("layout.plantilla")

@section("contenido")

<div>
    @include("layout.tablamateriaprima")
</div>
<br>
<div class="form-group row" style="background: transparent;margin: auto; margin-top: -16px; border: 1px solid black;">
    <form action="{{Route('crear_materia_prima')}}">
        <button type="submit" class="btn btn-primary" style = "float: right;margin: 15px;box-shadow: 1px -1px 10px 1px;">Agregar Materia Prima</button>
    </form>
    <form action="#">
        <button type="submit" class="btn btn-primary" style = "float: right;margin: 15px;box-shadow: 1px -1px 10px 1px;">Agregar Compra</button>
    </form>
</div>


@endsection