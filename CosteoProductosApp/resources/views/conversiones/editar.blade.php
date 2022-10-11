@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('conversiones.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('conversiones.update', $conversion)}}" method="POST" class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Edite el factor de conversion</h5>
                <br>
            </div>
            <!--Id del factor de conversion-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Id</label>
                <input type="text" value="{{$conversion->id}}" class="form-control" readonly>
            </div>
            <!--Nombre de la unidad de medida inicial-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Unidad de medida inicial</label>
                <input type="text" value="{{getNombreUnidadMedida($conversion->unidad_medida_inicial_id)}}" class="form-control" readonly>
            </div>
            <!--Nombre de la unidad de medida final-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Unidad de medida final</label>
                <input type="text" value="{{getNombreUnidadMedida($conversion->unidad_medida_final_id)}}" class="form-control" readonly>
            </div>
            <!--Factor de conversion-->
            <div class="col-md-2">
                <label for="inputPassword4" class="form-label">Factor de conversion</label>
                <input type="text" name="factor" value="{{$conversion->factor_conversion}}" class="form-control" >
            </div>
            <!--Boton Actualizar-->
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection