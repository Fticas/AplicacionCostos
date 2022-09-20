@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">
    <div class="col-md-12" style="margin:auto;background: transparent;">
        <div class="pull-right" style="background:transparent;">
            <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_materia_prima')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                Regresar a Materia Prima
            </a>
        </div>
    </div>
    <br>
</div>
<div>
    @include("layout.tablacompra")
    <form action="{{Route('crear_compra')}}">
        <button type="submit" class="btn btn-primary" style = "float: right;margin: 15px;box-shadow: 1px -1px 10px 1px;">Ingresar una Compra</button>
    </form>
</div>
<br>

@endsection