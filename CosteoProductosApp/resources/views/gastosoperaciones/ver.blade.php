@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('gastosoperaciones.crear')

    <br>
    <h3 style="text-align: center;">Tabla de costos operativos </h3>
    <br>
    <hr>
    <br>
   <div class="col-md-8 d-flex justify-content-between">
    <table class="table table-bordered">
        

        @if(count($gastos))
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Acciones</th>
                <th>Proveedor</th>
                <th>Mes y Año</th>
                <th>Monto</th>
                
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($gastos as $gasto)
            <tr>
                <td>
                    <a href="{{route('gastosoperaciones.edit', $gasto->id)}}" class="btn btn-success btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Editar informacion: ">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                    <a href="{{route('gastosoperaciones.edit', $gasto->id)}}" class="btn btn-danger btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Eliminar registro:">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                </td>
                <td>{{$gasto->proveedor->nombre}}</td>
                <td>{{date('m-Y',strtotime($gasto->fecha))}}</td>
                <td>${{number_format($gasto->monto,2)}}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <p style="text-align: center">No hay gastos listados</p>
        @endif

    </table>
    </div>
    <br>
</div>

@endsection