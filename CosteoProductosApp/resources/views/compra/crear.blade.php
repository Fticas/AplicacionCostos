@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">
    <div class="col-md-12" style="margin:auto;background: transparent;">
        <div class="pull-right" style="background:transparent;">
            <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_materia_prima')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                        Regresar
            </a>
        </div>
        <h4 class="text-center"style="background: transparent; margin-top: 10px;">Ingrese los datos de la compra</h4>
    </div>
    <br>
</div>


<div id="formulario_compra">
    <form action="{{route('guardar_compra')}}" method="POST">
    
        @csrf
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Proveedor:</label>
            <div class="col-sm-10">
                @if(count($proveedores))
                    <select name="nombre_proveedor" aria-label="Default select example" column="70" style="background:white">
                        @foreach($proveedores as $proveedor)
                            <option>{{$proveedor->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <select name="nombre_proveedor" aria-label="Default select example" column="70"></select>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Fecha de compra:</label>
            <div class="col-sm-10">
                <input type="date"  name="fecha" size="20" style="background:white">
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
    @include("layout.tablacompra")
</div>

@endsection