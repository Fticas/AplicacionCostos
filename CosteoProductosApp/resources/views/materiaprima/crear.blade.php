@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Ingrese los datos de la materia prima</h4>
    </p>
</div>
<div>
    <form action="{{route('guardar_materia_prima')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" placeholder="Nombre">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida Base:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidadmedida" aria-label="Default select example" column="70">
                        @foreach($unidadmedida as $um)
                            <option>{{$um->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <select name="nombre_unidadmedida" aria-label="Default select example" column="70"></select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
            </div>
            <div>
                <a href="{{Route('ver_materia_prima')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>
<div>
    @include("layout.tablamateriaprima")
</div>

@endsection