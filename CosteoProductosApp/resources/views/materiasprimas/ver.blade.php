@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('materiasprimas.crear')
    <br>

    <!--tabla de unidades de medida-->
    <table class="table table-bordered"`>
        <h3 style="text-align: center;">Materia Prima</h3>
        <div style="border-style: outset;"></div>
        <br>

        @if(count($materias_primas))
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Unidad de medida</th>
                <th>Costo unitario</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($materias_primas as $materia_prima)
            <tr>
                <td>
                    <a href="{{route('materiasprimas.show', $materia_prima->id)}}" class="btn btn-primary btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Ver Registro para {{$materia_prima->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                </td>
                <td>{{$materia_prima->nombre}}</td>
                <td>{{$materia_prima->unidadMedida->nombre}}</td>
                @if($materia_prima->cantidad_existencia == 0)
                <td>$ {{number_format(0, 2)}}</td>
                @else
                <td>$ {{number_format($materia_prima->costo_total / $materia_prima->cantidad_existencia, 2)}}</td>
                @endif
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