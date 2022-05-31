@extends("layout.plantilla")

@section("contenido")
<div class="row"style="margin:auto;">
        <div class="col-md-12" style="margin:auto;background: transparent;">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_materia_prima')}}"style="margin-top: 10px;margin-bottom: 10px;"> 
                    Regresar
                </a>
            </div>
            <h4 class="text-center"style="background: transparent;margin-top: 10px;" >Agregue los detalles de la compra</h4>
        </div>
</div>
<div>
    
        <h5 class="text-center">Producto: {{$materiaprima->nombre}}</h5>
        <br>
</div>
<div id="mostrar_materia_prima">
    <form action="{{route('agregar_materia_prima', $materiaprima)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Unidades compradas:</label>
            <div class="col-sm-10">
                <input type="text" type="text"  name="cantidad" size="8" style="background: white;">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70" style="background:white">
                        @foreach($unidadmedida as $um)
                            @if(getNombreMagnitudUnidadMedida($um->id) == getNombreMagnitudUnidadMedida($materiaprima->id_unidad_medida_base))
                            <option>{{$um->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70" ></select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Precio de compra:</label>
            <div class="col-sm-10">
                <input type="text" type="text"  name="preciocompra" size="8"style="background:white;">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px; float:right">Agregar Compra</button>
            </div>
        </div>
    </form>
</div>
<br>
<div>
    @include("layout.tablamp") 
</div>

@endsection