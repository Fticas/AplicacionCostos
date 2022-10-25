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
            <h5 style="text-align: center;">{{$receta->nombre}}</h5>
        </figcaption>
        <!--Descripcion de la receta-->
        <div class="col-12">
            <textarea name="descripcion" class="form-control" rows="5" readonly>{{$receta->descripcion}}</textarea>
            @error('descripcion')
                <small style="color: red">{{$message}}</small>
            @enderror
        </div>
        <br>
    </form>
    <div style="border-style: outset;"></div>
    @php
        $nuevos_insumos = false;
        $editable = false;
    @endphp
    <br>
    <p style="text-align: center;"><strong>Lista de materia prima</strong></p>
    @include('recetasmateriasprimas.ver')
</div>

@endsection