@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px">
    <h3 style="text-align: center;">Productos</h3>
    <div style="border-style: outset;"></div>
    <br>
    <div style="text-align: right;">
        <a href="{{route('productos.create')}}" class="btn btn-light" data-toggle="tooltip" data-placement="top">Crear Nuevo producto</a>
        <br>
        <br>
    </div>
    @if(count($productos))
        @foreach($productos as $producto)
        <div style="margin-bottom:2%">
            <div class="card" >
                <div class="card-header">
                    <h5 class="card-title">{{$producto->nombre}}</h5>
                </div>
                <div class="card-body">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        {{$producto->descripcion}}
                        <a href="{{route('productos.show', $producto->id)}}" class="btn btn-primary"
                            data-toggle="tooltip" data-placement="top">
                            Ver producto
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p style="text-align: center">No se encontraron productos</p>
    @endif
</div>

@endsection