@extends("layout.plantilla")

@section("contenido")

<div>
    <p>
        <h4>Ingrese los datos del nuevo operario</h4>
    </p>
</div>
<div>
    <form action="{{route('guardar_operario')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Documento:</label>
            <div class="col-sm-10">
                <input type="text"  name="dui" size="20" placeholder="Numero de dui">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" placeholder="Nombre">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Salario por hora:</label>
            <div class="col-sm-10">
                <input type="text"  name="salario_hora" size="10" placeholder="Sueldo">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Domicilio:</label>
            <div class="col-sm-10">
                <textarea type="text"  name="direccion" size="20" placeholder="Direccion de residencia"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10"> <br>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="reset" class="btn btn-primary">Limpiar</button>
            </div>
            <div>
                <a href="{{Route('ver_operario')}}">regresar</a>
            </div>
        </div>
    </form>
    <br>
</div>
<div>
    @include("layout.tablaoperario")
</div>

@endsection