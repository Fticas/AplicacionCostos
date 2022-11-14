@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('recetas.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
            </a>
        </div>
    </div>
    <!--Formulario de recetas-->
    <form action="{{route('recetas.store')}}" method="post" style="padding: 25px;">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        
        <!--Encabezado del formulario-->
        <figcaption>
            <h5 style="text-align: center;">Ingrese los datos de la receta</h5>
        </figcaption>
        <!--Nombre de la receta-->
        <div class="col-md-10">
            <label for="" class="form-label">Nombre de la receta</label>
            <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" id="">
            @error('nombre')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <!--Descripcion de la receta-->
        <div class="col-10">
            <label for="" class="form-label">Descripcion de la receta</label>
            <textarea name="descripcion" class="form-control" rows="5">{{old('descripcion')}}</textarea>
            @error('descripcion')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <!--Cantidad de productos-->
        <div class="col-md-2">
            <label for="" class="form-label">Cantidad de productos</label>
            <input type="text" name="cantidad" value="{{old('cantidad')}}" class="form-control" id="">
            @error('cantidad')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <br>
        <!--Boton crear receta-->
        <div class="col-md-4">
            <input type="submit" value="Crear receta nueva" class="btn btn-primary">
        </div>
    </form>
    <div style="border-style: outset;"></div>
    @php
        $nuevos_insumos = true;
        $editable = true;
    @endphp
    @include('recetasmateriasprimas.crear')
    @include('recetasmateriasprimas.ver')
</div>

@endsection