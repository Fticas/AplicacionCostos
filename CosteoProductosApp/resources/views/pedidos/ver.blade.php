@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="text-align: right;">
        <a href="{{route('pedidos.create')}}" class="btn btn-light" data-toggle="tooltip" data-placement="top">
            Nuevo pedido
        </a>
    </div>
    <div style="padding: 20px;">
        @if(count($pedidos))
        <figcaption>
            <h5 style="text-align: center;">Lista de pedidos</h5>
        </figcaption>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha realizada</th>
                    <th scope="col">Fecha de entrega</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Imprevisto</th>
                    <th scope="col">Descuento</th>
                    <th scope="col">Ver</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <th scope="row">{{$pedido->id}}</th>
                    <td>{{$pedido->nombre_cliente}}</td>
                    <td>{{$pedido->fecha_realizada}}</td>
                    <td>{{$pedido->fecha_entrega}}</td>
                    <td>{{$pedido->estado}}</td>
                    <td>$ {{number_format($pedido->imprevisto, 2)}}</td>
                    <td>$ {{number_format($pedido->descuento, 2)}}</td>
                    <td>
                        <a href="{{route('pedidos.show', $pedido->id)}}" class="btn btn-primary btn-sm shadow-none"
                            data-toggle="tooltip" data-placement="top"
                            title="Ver detalles del pedido">
                            <i class="fa fa-book fa-fw text-white"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif  
    </div>
</div>


@endsection