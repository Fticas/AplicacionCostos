@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('materiasprimas.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
        <a class="btn btn-success" data-placement="top" title="Regresar" href="{{route('materiasprimas.edit', $materia_prima->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-pencil fa-fw"></i> Edit
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="" method="" class="row g-3" style="padding: 25px;">
            <!--Id de la materia prima-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Id</label>
                <input type="text" value="{{$materia_prima->id}}" class="form-control" readonly>
            </div>
            <!--Nombre de la materia prima-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" value="{{$materia_prima->nombre}}" class="form-control" readonly>
            </div>
            <!--Cantidad en existencia de la materia prima-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Cantidad en existencia</label>
                <input type="text" value="{{$materia_prima->cantidad_existencia}}" class="form-control" readonly>
            </div>
            <!--Unidad de medida de la materia prima-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Unidad de medida</label>
                <input type="text" value="{{$materia_prima->unidadMedida->nombre}}" class="form-control" readonly>
            </div>
            <!--Costo total de la materia prima-->
            <div class="col-md-2">
                <label class="form-label">Costo total</label>
                <input type="text" value="$ {{number_format($materia_prima->costo_total, 2)}}" class="form-control" readonly>
            </div>
        </form>
    </div>
    <br>
    <div style="border-style: outset;"></div>
    <br>
    <div>
        <h5 style="text-align: center;">Productos que utilizan "{{$materia_prima->nombre}}" para su elaboraci&oacute;n</h5>
    </div>
</div>

@endsection