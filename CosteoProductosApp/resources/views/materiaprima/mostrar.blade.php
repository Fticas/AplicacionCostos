@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Agregue los detalles de la compra</h4>
    </p>
    <p>
        <h5>Producto: {{$materiaprima->nombre}}</h5>
    </p>
</div>
<div>
    <form action="{{route('agregar_materia_prima', $materiaprima)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Unidades compradas:</label>
            <div class="col-sm-10">
                <input type="text" type="text"  name="cantidad" size="8">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70">
                        @foreach($unidadmedida as $um)
                            @if(getNombreMagnitudUnidadMedida($um->id) == getNombreMagnitudUnidadMedida($materiaprima->id_unidad_medida_base))
                            <option>{{$um->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70"></select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Precio de compra:</label>
            <div class="col-sm-10">
                <input type="text" type="text"  name="preciocompra" size="8">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Agregar Compra</button>
            </div>
            <div>
                <a href="{{Route('ver_materia_prima')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>
<div>
    @include("layout.tablamp")
</div>

@endsection