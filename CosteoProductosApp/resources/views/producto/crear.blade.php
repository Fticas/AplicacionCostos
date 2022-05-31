@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Ingrese los datos del nuevo producto</h4>
    </p>
</div>
<div>
    <form action="{{route('guardar_producto')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" size="20" placeholder="Nombre">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Descripcion:</label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" name="descripcion" size="20" placeholder="Breve descripcion"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
            </div>
            <div>
                <a href="{{Route('ver_producto')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>
<div>
    @include("layout.tablaproducto")
</div>

@endsection