@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;">
        <div class="col-md-12" style="margin:auto;background: transparent;">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_materia_prima')}}"style="margin-top: 10px;margin-bottom: 10px;"> 
                    Regresar
                </a>
            </div>
            <h4 class="text-center"style="background: transparent;margin-top: 10px;" >Edite los campos que desea modificar</h4>
        </div>
</div>
<div id="editar_materia_prima">
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
            <label for="inputText" class="col-sm-2 col-form-label" >Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" value="{{$materiaprima->nombre}}"style="background:white">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Unidades en existencia:</label>
            <div class="col-sm-10">
                <input readonly type="text" type="text"  name="unidadesexistencia" size="20" value="{{$materiaprima->unidades_existencia}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSelect" class="col-sm-2 col-form-label">Unidad de Medida Base:</label>
            <div class="col-sm-10">
                @if(count($unidadmedida))
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70"style="background:white">
                        @foreach($unidadmedida as $um)
                            @if(getNombreMagnitudUnidadMedida($um->id) == getNombreMagnitudUnidadMedida($materiaprima->id_unidad_medida_base))
                            @if($materiaprima->id_unidad_medida_base == $um->id)
                            <option selected>{{$um->nombre}}</option>
                            @else
                            <option>{{$um->nombre}}</option>
                            @endif
                            @endif
                        @endforeach
                    </select>
                @else
                    <select name="nombre_unidad_medida" aria-label="Default select example" column="70"></select>
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
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px; float:right">Actualizar</button>
            </div>
            <div>
            </div>
        </div>
    </form>
</div>

@endsection