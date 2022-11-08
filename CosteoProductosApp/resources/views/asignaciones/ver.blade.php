@extends('layout.plantillaprincipal')

@section('contenido')

@php $indice = 1 @endphp

<div style="padding: 20px;">
    <figcaption>
        <h5 style="text-align: center;">Lista de productos procesados como pedido</h5>
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
            <tr>
                <th scope="row">{{$indice}}</th>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->cantidad}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>
                    <a href="{{route('asignaciones.show', $producto->id)}}">
                        <button type="submit" class="btn btn-primary btn-sm shadow-none" title="Eliminar del pedido">
                            <i class="fa fa-book fa-fw text-white"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @php $indice += 1 @endphp
            @endforeach
        </tbody>
    </table>
</div>

@endsection