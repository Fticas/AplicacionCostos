@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('operarios.crear')

    <br>
    <!--tabla de unidades de medida-->
    <table class="table table-bordered">
        <h3 style="text-align: center;">Lista de operarios</h3>
        <div style="border-style: outset;"></div>
        <br>

        @if(count($operarios))
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Nombre</th>
                <th>Carnet</th>
                <th>Pago por hora</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($operarios as $operario)
            <tr>
                <td>
                    <a href="{{route('operarios.edit', $operario->id)}}" class="btn btn-success btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Editar informacion: {{$operario->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                    <a href="{{route('operarios.edit', $operario->id)}}" class="btn btn-danger btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Eliminar registro: {{$operario->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                </td>
                <td>{{$operario->nombre}}</td>
                <td>{{$operario->apellido}}</td>
                <td>{{$operario->carnet}}</td>
                <td>${{number_format($operario->precio_hora, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <p style="text-align: center">No hay operarios listados</p>
        @endif

    </table>
    <br>
</div>

@endsection