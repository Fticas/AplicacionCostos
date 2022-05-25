@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Ingrese los datos de la unidad de medida</h4>
    </p>
</div>
<div>
    <form action="{{route('guardar_unidad_medida')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" placeholder="Nombre">
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
                <input type="text"  name="simbolo" size="10" placeholder="Simbolo">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
            </div>
            <div>
                <a href="{{Route('ver_unidad_medida')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>
<div>
    @include("layout.tablaunidadmedida")
</div>

@endsection