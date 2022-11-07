@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="text-align: right;">
        <a href="{{route('pedidos.create')}}" class="btn btn-light" data-toggle="tooltip" data-placement="top">
            Nuevo pedido
        </a>
    </div>
</div>

@endsection