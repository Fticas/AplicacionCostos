@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Edite los campos que desea modificar</h4>
    </p>
</div>
<div>
    <form action="{{route('actualizar_unidad_medida', $unidadmedida)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">C&oacutedigo:</label>
            <div class="col-sm-10">
                <input readonly type="text"  name="codigo" size="15" value="{{$unidadmedida->id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" value="{{$unidadmedida->nombre}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Magnitud:</label>
            <div class="col-sm-10">
                @if(count($magnitud))
                    <select name="magnitud" aria-label="Default select example" column="70">
                        @foreach($magnitud as $mag)
                            <option>{{$mag->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <select name="magnitud" aria-label="Default select example" column="70"></select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Simbolo:</label>
            <div class="col-sm-10">
                <input type="text"  name="simbolo" size="10" value="{{$unidadmedida->simbolo}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <a href="{{Route('ver_unidad_medida')}}">regresar</a>
        </div>
    </form>
    <br>
</div>

@endsection