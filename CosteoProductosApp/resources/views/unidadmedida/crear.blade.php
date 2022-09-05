@extends("layout.plantilla")

@section("contenido")

<div class="row"style="margin:auto;margin-bottom: 5x;">

            <div class="col-md-12" style="margin:auto;background: transparent;">
                <div class="pull-right" style="background:transparent;">
                    <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Regresar" href="{{Route('ver_unidad_medida')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                        Regresar
                    </a>
                </div>
                <h4 class="text-center"style="background: transparent; margin-top: 10px;">Ingrese los datos de la unidad de medida</h4>
            </div>
            <br>
</div>
<div id ="formulario_unidad"class="col-md-12">
        @if (session('registro_creado'))
        <div  class="alert alert-success alert-dismissible fade show crear" role="alert">
            {{session('registro_creado')}}
        </div>
        @endif



    <form action="{{route('guardar_unidad_medida')}}" method="POST">
    
        @csrf

        <div class="form-group row">
            <div class="row" style="margin: auto;"><br></div>
            <label for="inputText" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  name="nombre" size="20" placeholder="Nombre" value="{{old('nombre')}}" style="background:white">
            </div>
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
            <label for="inputSelect" class="col-sm-2 col-form-label">Magnitud:</label>
            <div class="col-sm-10">
                @if(count($magnitud))
                    <select name="nombre_magnitud" aria-label="Default select example" column="70"value="{{old('nombre_magnitud')}}"style="background:white">
                        @foreach($magnitud as $mag)
                            <option>{{$mag->nombre}}</option>
                        @endforeach
                    </select>
                @else
                    <select name="nombre_magnitud" aria-label="Default select example" column="70"></select>
                @endif
            </div>
        
            <label for="inputText" class="col-sm-2 col-form-label">Simbolo:</label>
            <div class="col-sm-10">
                <input type="text"  name="simbolo" size="10" placeholder="Simbolo" value="{{old('simbolo')}}"style="background:white">
            </div>
            <label><br></label>
            @error('simbolo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group row"style="margin: auto;" >
            <div class="col-sm-12"> 
                <button type="submit" class="btn btn-primary" style ="margin: 15px;box-shadow: 1px -1px 10px 1px;float: right;">Agregar</button>
                <button type="reset" class="btn btn-primary"style ="margin: 15px;box-shadow: 1px -1px 10px 1px;float:right">Limpiar</button>
            </div>
        </div>

    </form>
    
</div>
<br>
<div>
    @include("layout.tablaunidadmedida")
</div>

@endsection