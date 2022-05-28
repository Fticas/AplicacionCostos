@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Edite los campos que desea modificar</h4>
    </p>
</div>
<div>
    <form action="{{route('actualizar_materia_prima', $materiaprima)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Codigo:</label>
            <div class="col-sm-10">
                <input readonly type="text" type="text"  name="id" size="20" value="{{$materiaprima->id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" value="{{$materiaprima->nombre}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input readonly type="text" type="text"  name="unidadesexistencia" size="20" value="{{$materiaprima->unidades_existencia}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida Base:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidadmedida" aria-label="Default select example" column="70">
                        @foreach($unidadmedida as $um)
                            @if($materiaprima->id_unidad_medida_base == $um->id)
                            <option selected>{{$um->nombre}}</option>
                            @else
                            <option>{{$um->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <select name="nombre_unidadmedida" aria-label="Default select example" column="70"></select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Precio unitario:</label>
            <div class="col-sm-10">
                <input readonly type="text" type="text"  name="preciounitario" size="20" value="{{$materiaprima->precio_unitario}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <div>
                <a href="{{Route('ver_materia_prima')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>

@endsection