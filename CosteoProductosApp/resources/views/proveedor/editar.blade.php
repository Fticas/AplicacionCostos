@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">
            <div class="col-md-12" style="margin:auto;background: transparent;">
                <div class="pull-right" style="background:transparent;">
                    <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_proveedor')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                        Regresar
                    </a>
                </div>
                <h4 class="text-center"style="background: transparent; margin-top: 10px;">Edite los datos que desea modificar</h4>
            </div>
            <br>
</div>
<div id="formulario_producto">
    <form action="{{route('actualizar_proveedor', $proveedor)}}" method="POST">
    
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Id:</label>
            <div class="col-sm-10">
                <input readonly type="text" name="id" size="20" value="{{$proveedor->id}}" style="background:white;">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" size="20" value="{{$proveedor->nombre}}" style="background:white;">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Descripcion:</label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" name="descripcion" size="20" style="background:white;">{{$proveedor->descripcion}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="float: right; margin: 15px;box-shadow: 1px -1px 10px 1px;">Actualizar</button>
            </div>
        </div>
        
    </form>
</div>
<br>

@endsection