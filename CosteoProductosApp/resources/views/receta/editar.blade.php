@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;">
        <div class="col-md-12" style="margin:auto;background: transparent;">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Ir a productos" href="{{Route('ver_producto')}}"style="margin-top: 10px;margin-bottom: 10px;"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
                <a class="btn btn-success" href="{{Route('ver_receta', $receta->id_producto )}}" title="Regresar">Regresar</a>
            </div>
            <h4 class="text-center"style="background: transparent;margin-top: 10px;" >Edite los campos que desea modificar</h4>
        </div>
</div>
<div id="editar_receta">
    <form action="{{route('actualizar_receta', $receta)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Codigo:</label>
            <div class="col-sm-10">
                <input readonly type="text"  name="id" size="20" value="{{$receta->id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Producto:</label>
            <div class="col-sm-10">
                <input readonly type="text"  name="id_producto" size="20" value="{{getNombreProducto($receta->id_producto)}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Materia prima:</label>
            <div class="col-sm-10">
                <input readonly type="text"  name="nombre_materia_prima" size="20" value="{{getNombreMateriaPrima($receta->id_materia_prima)}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Cantidad:</label>
            <div class="col-sm-10">
                <input type="text"  name="cantidad" size="20" value="{{$receta->cantidad}}" style="background:white">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida Base:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70">
                        @foreach($unidadmedida as $um)
                            @if($um->id == $receta->id_unidad_medida)
                            <option selected>{{$um->nombre}}</option>
                            @else
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
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px; float:right">Actualizar</button>
            </div>
        </div>
    </form>
   
</div>

@endsection