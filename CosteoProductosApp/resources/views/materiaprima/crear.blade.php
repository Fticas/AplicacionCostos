@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">
            <div class="col-md-12" style="margin:auto;background: transparent;">
                <div class="pull-right" style="background:transparent;">
                    <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_materia_prima')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                        Regresar
                    </a>
                </div>
                <h4 class="text-center"style="background: transparent; margin-top: 10px;">Ingrese los datos de la materia prima</h4>
            </div>
            <br>
</div>


<div id="formulario_materia_prima">
    <form action="{{route('guardar_materia_prima')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" placeholder="Nombre" style="background:white">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida Base:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidadmedida" aria-label="Default select example" column="70" style="background:white">
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
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px;float: right;">Agregar</button>
                <button type="reset" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px;float: right;">Limpiar</button>
            </div>
            <div>
                
            </div>
        </div>
    </form>
</div>
<br>
<div>

    @include("layout.tablamateriaprima")
</div>

@endsection