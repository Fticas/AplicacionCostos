@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Edite los campos que desea modificar</h4>
    </p>
</div>
<div>
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
                <input type="text"  name="nombre" size="20" value="{{$producto->nombre}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Descripcion:</label>
            <div class="col-sm-10">
                <textarea type="text" rows="2" name="descripcion" size="20">{{$producto->descripcion}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <div>
                <a href="{{Route('ver_producto')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>

@endsection