@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">
            <div class="col-md-12" style="margin:auto;background: transparent;">
                <div class="pull-right" style="background:transparent;">
                    <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_producto')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                        Regresar
                    </a>
                </div>
                <h4 class="text-center"style="background: transparent; margin-top: 10px;">Ingrese los datos del nuevo producto</h4>
            </div>
            <br>
</div>
<div id="formulario_producto">
    <form action="{{route('guardar_producto')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" size="20" placeholder="Nombre"style="background:white;">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Descripcion:</label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" name="descripcion" size="20" placeholder="Breve descripcion" style="background:white;"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="float: right; margin: 15px;box-shadow: 1px -1px 10px 1px;">Agregar</button>
                <button type="reset" class="btn btn-primary" style ="float: right; margin: 15px;box-shadow: 1px -1px 10px 1px;">Limpiar</button>
            </div>
        </div>
        
    </form>
</div>
<br>
<div>
    @include("layout.tablaproducto")
</div>

@endsection