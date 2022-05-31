@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;">
        <div class="col-md-12" style="margin:auto;background: transparent;">
            <div class="pull-right"style="background:transparent;">
                <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_producto')}}"style="margin-top: 10px;margin-bottom: 10px;"> 
                    Regresar
                </a>
            </div>
            <h4 class="text-center"style="background: transparent;margin-top: 10px;" >Edite los campos que desea modificar</h4>
        </div>
</div>
<div id="editar_unidad" class="col-md-12">
    <form action="{{route('actualizar_unidad_medida', $unidadmedida)}}" method="POST">
    
        @csrf
        @method('put')

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">C&oacutedigo:</label>
            <div class="col-sm-10">
                <input readonly type="text" name="codigo" size="15" value="{{$unidadmedida->id}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" value="{{$unidadmedida->nombre}}" style="background:white;">
            </div>
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group row" style="margin:auto">
            <label for="inputSelect" class="col-sm-2 col-form-label">Magnitud:</label>
            <div class="col-sm-10">
                @if(count($magnitud))
                    <select name="nombre_magnitud" aria-label="Default select example" column="70" style="background:white">
                        @foreach($magnitud as $mag)
                            @if($mag->id == $unidadmedida->id_magnitud)
                            <option selected>{{$mag->nombre}}</option>
                            @else
                            <option>{{$mag->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    <select name="nombre_magnitud" aria-label="Default select example" column="70"></select>
                @endif
                @error('nombre_magnitud')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row" style="margin:auto">
            <label for="inputText" class="col-sm-2 col-form-label">Simbolo:</label>
            <div class="col-sm-10">
                <input type="text"  name="simbolo" size="10" value="{{$unidadmedida->simbolo}}" style="background:white">
            </div>
            @error('simbolo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-12"> <br>
                <button type="submit" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px; float:right">Actualizar</button>
            </div>
        </div>
    </form>
    
</div>

@endsection