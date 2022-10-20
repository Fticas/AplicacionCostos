@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('unidadesmedida.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
        <a class="btn btn-success" data-placement="top" title="Regresar" href="{{route('unidadesmedida.edit', $unidad_medida->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-pencil fa-fw"></i> Edit
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="" method="" class="row g-3" style="padding: 25px;">
            <!--Id de la unidad de medida-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Id</label>
                <input type="text" value="{{$unidad_medida->id}}" class="form-control" readonly>
            </div>
            <!--Nombre de la unidad de medida-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" value="{{$unidad_medida->nombre}}" class="form-control" readonly>
            </div>
            <!--Simbolo de la unidad de medida-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Simbolo</label>
                <input type="text" value="{{$unidad_medida->simbolo}}" class="form-control" readonly>
            </div>
            <!--Magnitud de la unidad de medida-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Magnitud</label>
                <input type="text" value="{{$unidad_medida->magnitud->nombre}}" class="form-control" readonly>
            </div>
        </form>
    </div>
    <br>
    <div style="border-style: outset;"></div>
    <br>
    <div>
        <h5 style="text-align: center;">Materia Prima utilizando "{{$unidad_medida->nombre}}" como unidad de medida base</h5>
        @include("layout.tablas.tablaunidadmedidaproductos")
    </div>
</div>

@endsection