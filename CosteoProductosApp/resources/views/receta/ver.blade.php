@extends("layout.plantilla")

@section("contenido")

<br>
<div class="container">
    <div class="row row-cols-3">
        <div class="col">
            <div class="row"><h4>Descripcion del producto</h4></div>
            <div class="row">Codigo: {{$producto->id}}</div>
            <div class="row">Nombre: {{$producto->nombre}}</div>
            <div class="row">Descripcion: {{$producto->descripcion}}</div>
        </div>
        <div class="col">
            <form action="{{route('guardar_receta')}}" method="POST">
                @csrf
                <div class="form-group row" hidden>
                    <div class="col-sm-10">
                        <input type="text" name="id_producto" size="5" value="{{$producto->id}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSelect" class="col-sm-2 col-form-label">Insumo:</label>
                    <div class="col-sm-10">
                        @if(count($materiaprima))
                            <select name="nombre_materia_prima" aria-label="Default select example" column="70">
                                @foreach($materiaprima as $mp)
                                    <option>{{$mp->nombre}}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="nombre_materia_prima" aria-label="Default select example" column="70"></select>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputText" class="col-sm-2 col-form-label">Cant:</label>
                    <div class="col-sm-10">
                        <input type="text" name="cantidad" size="5" placeholder="Cantidad">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSelect" class="col-sm-2 col-form-label">Medida:</label>
                    <div class="col-sm-10">
                        @if(count($unidadmedida))
                            <select name="nombre_unidad_medida" aria-label="Default select example" column="70">
                                @foreach($unidadmedida as $um)
                                    <option>{{$um->nombre}}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="nombre_unidad_medida" aria-label="Default select example" column="70"></select>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10"> <br>
                        <button type="submit" class="btn btn-primary">Agregar materia prima</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    @include("layout.tablareceta")
    <a href="{{Route('ver_producto')}}">regresar</a>
</div>

@endsection