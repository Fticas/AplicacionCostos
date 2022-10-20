@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('unidadesmedida.crear')
    <br>

    <!--tabla de unidades de medida-->
    <table class="table table-bordered"`>
        <h3 style="text-align: center;">Unidades de medida</h3>
        <div style="border-style: outset;"></div>
        <br>

        @if(count($unidades_medida))
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Simbolo</th>
                <th>Magnitud</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($unidades_medida as $unidad_medida)
            <tr>
                <td>
                    <a href="{{route('unidadesmedida.show', $unidad_medida->id)}}" class="btn btn-primary btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Ver registro de {{$unidad_medida->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                </td>
                <td>{{$unidad_medida->nombre}}</td>
                <td>{{$unidad_medida->simbolo}}</td>
                <td>{{$unidad_medida->magnitud->nombre}}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <p style="text-align: center">No records found</p>
        @endif

    </table>
    <br>
</div>

@endsection