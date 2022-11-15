@extends('layout.plantillaprincipal')

@section('contenido')

@php $indice = 1 @endphp

<div style="padding: 20px;">
    <figcaption>
        <h5 style="text-align: center;">Lista de productos en proceso</h5>
    </figcaption>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Finalizar Asignacion</th>
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
                    <a href="{{route('finalizaciones.show', $producto->id)}}" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary btn-sm shadow-none" title="ver detalles">
                            <i class="fa fa-book fa-fw text-white"></i>
                        </button>
                    </a>
                    <form action="{{route('finalizaciones.update', $producto->id)}}" method="post" style="display: inline-block;">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-primary btn-sm shadow-none" title="Finalizar">
                            <i class="fa fa-pencil fa-fw text-white"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @php $indice += 1 @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection