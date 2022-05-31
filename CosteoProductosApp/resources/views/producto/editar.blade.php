@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;">
        <div class="col-md-12" style="margin:auto;background: transparent;">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_producto')}}"style="margin-top: 10px;margin-bottom: 10px;"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
            <h4 class="text-center"style="background: transparent;margin-top: 10px;" >Edite los campos que desea modificar</h4>
        </div>
</div>
<div id="editar_producto">
    <form action="{{route('actualizar_producto', $producto)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Codigo:</label>
            <div class="col-sm-10">
                <input readonly type="text" name="id" size="20" value="{{$producto->id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" value="{{$producto->nombre}}"style="background:white;">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Descripcion:</label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" name="descripcion" size="20"  style="background:white;">{{$producto->descripcion}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Imprevisto:</label>
            <div class="col-sm-10">
                <input type="text" rows="2" name="imprevisto" size="20" value = "{{$producto->imprevisto}}" style="background:white;">
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