@extends("layout.plantilla")

@section("contenido")

<br>
<div style="border: 1px solid;" >
    <div class="row row-cols-1" style="background:transparent" >
        <div class="col" style=" background: transparent;border:1px solid;margin-left:">
            
            <div class="col-sm-10" style=" background: transparent;"><h4 class = "text-center"style="background:transparent
                ">Descripcion de la Compra</h4><br></div>
            <div class="col-sm-10" style="background:transparent">Codigo: {{$compra->id}}</div>
            <div class="col-sm-10" style="background:transparent">Proveedor: {{obtenerNombreProveedor($compra->id_proveedor)}}</div>
            <div class="col-sm-10" style="background:transparent">Fecha de compra: {{$compra->fecha}}</div>
            <div class="col-sm-10" style="background:transparent">Total de compra: ${{number_format($compra->total, 2)}}</div>
            
        </div>
        <div class="col" style="background: transparent;">

            <form action="{{route('guardar_orden_compra')}}" method="POST">
                @csrf
                <div class="form-group row" hidden>
                    <div class="col-sm-8">
                        <input type="text" name="id_compra" size="5" value="{{$compra->id}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <div>
                        <p >
                            <h5 class = "text-center" style="background:transparent" >Seleccione el producto que agregara a esta compra</h5>
                        </p>
                    </div>
                    <label for="inputSelect" class="col-sm-2 col-form-label">Producto:</label>
                    <div class="col-sm-10">
                        @if(count($materiaprima))
                            <select name="nombre_materia_prima" aria-label="Default select example" column="70"  style="background:white">
                                @foreach($materiaprima as $mp)
                                    <option>{{$mp->nombre}}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="nombre_materia_prima" aria-label="Default select example" column="70" style="background:white"></select>
                        @endif
                    </div>
                    <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de medida:</label>
                    <div class="col-sm-10">
                        @if(count($unidadmedida))
                            <select name="nombre_unidad_medida" aria-label="Default select example" column="70"  style="background:white">
                                @foreach($unidadmedida as $um)
                                    <option>{{$um->nombre}}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="nombre_unidad_medida" aria-label="Default select example" column="70" style="background:white"></select>
                        @endif
                    </div>
                    <label for="inputText" class="col-sm-2 col-form-label" >Cantidad:</label>
                    <div class="col-sm-10   ">
                        <input type="text" name="cantidad" size="5" placeholder="Cantidad"style="background:white; ">
                    </div>

                    <label for="inputText" class="col-sm-2 col-form-label" >Precio de compra:</label>
                    <div class="col-sm-10   ">
                        <input type="text" name="precio" size="5" placeholder="Precio"style="background:white; ">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12" > 
                        <button type="submit" class="btn btn-primary"style = "float: right; margin: 15px;box-shadow: 1px -1px 10px 1px;">Agregar Producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_compra')}}"style="margin-top: 25px;margin-bottom: 10px;"> 
            Regresar
        </a>
    </div>
</div>
<br>
<div>
    @include("layout.tablaordencompra")
</div>

@endsection