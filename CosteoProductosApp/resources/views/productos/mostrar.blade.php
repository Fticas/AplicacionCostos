@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('productos.index')}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
            </a>
            <a class="btn btn-success" data-placement="top" title="Editar" href="{{route('productos.edit', $producto->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-pencil" aria-hidden="true"> Editar</i>
            </a>
            <form action="{{route('productos.destroy', $producto->id)}}" method="post" style="display: inline-block;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"> Eliminar </i>
                </button>
            </form>
        </div>
    </div>
    <form action="" method="post" style="padding: 25px;">
        <input type="hidden" name=_token value='{{csrf_token()}}'>
        <!--Encabezado del formulario-->
        <div>
            <h5 style="text-align: center;">Datos del producto</h5>
        </div>
        <div style="border-style: outset;"></div>
        <br>
        <!--Nombre del producto-->
        <div class="col-md-5">
            <label for="" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" value="{{$producto->nombre}}" class="form-control" readonly>
        </div>
        <br>
        <!--Descripcion del producto-->
        <div class="col-md-10">
            <label for="" class="form-label">Descripcion del nuevo producto</label>
            <textarea name="descripcion" class="form-control" rows="3" readonly>{{$producto->descripcion}}</textarea>
        </div>
        <br>
        <!--Nombre de la receta de la receta-->
        <div class="col-md-5">
            <label for="" class="form-label">Receta del producto</label>
            <input type="text" name="nombre" value="{{$producto->receta->nombre}}" class="form-control" readonly>
        </div>
        <br>
        <!--Descripcion de la receta de la receta-->
        <div class="col-md-10">
            <label for="" class="form-label">Descripcion de la receta</label>
            <textarea name="descripcion" class="form-control" rows="3" readonly>{{$producto->receta->descripcion}}</textarea>
        </div>
    </form>
    @php
        $editable = false;
    @endphp
    <br>
    <p style="text-align: center;"><strong>Lista de materia prima de la receta del producto</strong></p>
    @include('recetasmateriasprimas.ver')
</div>

@endsection