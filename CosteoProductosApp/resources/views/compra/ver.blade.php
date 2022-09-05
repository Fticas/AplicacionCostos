@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">
    <div class="col-md-12" style="margin:auto;background: transparent;">
        <div class="pull-right" style="background:transparent;">
            <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_materia_prima')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                        Regresar
            </a>
        </div>
    </div>
    <br>
</div>
<div>
    @include("layout.tablacompra")
</div>
<br>

@endsection