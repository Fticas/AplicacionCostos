@extends("layout.plantilla")

<?php include("funciones.php"); ?>

@section("contenido")

<div>
    <p>
        <h4>Edite los campos que desea modificar</h4>
    </p>
</div>
<div>
    <form action="{{route('actualizar_conversion', $conversion)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Unidad de medida inicial:</label>
            <div class="col-sm-10">
                <input readonly type="text"  name="uminicial" size="15" value="{{getNombreUnidadMedida($unidadmedida, $conversion->unidad_medida_inicial)}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Unidad de medida final:</label>
            <div class="col-sm-10">
                <input readonly type="text" type="text"  name="umfinal" size="20" value="{{getNombreUnidadMedida($unidadmedida, $conversion->unidad_medida_final)}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Factor de conversion:</label>
            <div class="col-sm-10">
                <input type="text"  name="factor" size="10" value="{{$conversion->factor_conversion}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <a href="{{route('ver_conversion')}}">regresar</a>
        </div>
    </form>
    <br>
</div>

@endsection