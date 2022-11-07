@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('equipos.crear')

    <br>
    <!--tabla de unidades de medida-->
    <table class="table table-bordered">
        <h3 style="text-align: center;">Lista de equipos</h3>
        <div style="border-style: outset;"></div>
        <br>

        @if(count($equipos))
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Acciones</th>
                <th>Proveedor</th>
                <th>Fecha de compra</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Costo</th>
                <th>Vida util</th>
                <th>Depreciacion mensual</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($equipos as $equipo)

             @if($equipo->vida_util>0)
            <tr>
                <td>
                    <a href="{{route('equipos.edit', $equipo->id)}}" class="btn btn-success btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Editar informacion: {{$equipo->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                    <a href="{{route('equipos.edit', $equipo->id)}}" class="btn btn-danger btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Eliminar registro: {{$equipo->nombre}}">
                        <i class="fa fa-trash fa-fw text-white"></i>
                    </a>
                </td>
                <td>{{$equipo->proveedor->nombre}}</td>
                <td>{{date('d-m-Y',strtotime($equipo->fecha_compra_equipo))}}</td>
                <td>{{$equipo->nombre}}</td>
                <td>{{$equipo->descripcion}}</td>
                <td>${{number_format($equipo->costo, 2)}}</td>
                <td>{{number_format($equipo->vida_util, 2)}}</td>
                <td>${{number_format($equipo->costo/$equipo->vida_util, 2)}}</td>
            </tr>
             @else
             @endif
            @endforeach
        </tbody>
        @else
        <p style="text-align: center">No hay equipos listados</p>
        @endif

    </table>
    <br>
</div>

@endsection