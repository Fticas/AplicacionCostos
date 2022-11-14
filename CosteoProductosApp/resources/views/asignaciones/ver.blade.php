@extends('layout.plantillaprincipal')

@section('contenido')

@php $indice = 1 @endphp

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('asignaciones.create')}}"
                style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-pencil" aria-hidden="true"> Detalle de Asignaciones</i>
            </a>
        </div>
    </div>
    <figcaption>
        <h5 style="text-align: center;">Lista de productos pendientes de hornear</h5>
    </figcaption>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Asignar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            @if($producto->cantidad != 0)
            <tr>
                <th scope="row">{{$indice}}</th>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->cantidad}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>
                    <a href="{{route('asignaciones.show', $producto->id)}}">
                        <button type="submit" class="btn btn-primary btn-sm shadow-none" title="Asignar pedidos">
                            <i class="fa fa-book fa-fw text-white"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @php $indice += 1 @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection