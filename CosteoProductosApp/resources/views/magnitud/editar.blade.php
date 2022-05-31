@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;">
        <div class="col-md-12" style="margin:auto;background: transparent;">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_magnitud')}}"style="margin-top: 10px;margin-bottom: 10px;"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
            <h4 class="text-center"style="background: transparent;margin-top: 10px;" >Edite los campos que desea modificar</h4>
        </div>
</div>
<div id="editar_magnitud">
    <form action="{{route('actualizar_magnitud', $magnitud)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">C&oacutedigo:</label>
            <div class="col-sm-10">
                <input readonly type="text"  name="codigo" size="15" value="{{$magnitud->id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" value="{{$magnitud->nombre}}"style="background:white;">
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