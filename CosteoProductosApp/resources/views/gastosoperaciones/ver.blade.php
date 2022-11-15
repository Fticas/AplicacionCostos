@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('gastosoperaciones.crear')
    <br>
    <form action="{{route('gastosoperaciones.show',1)}}" method="put" class="row g-3" style="padding: 25px;">
        @csrf
        <input type="hidden" name=_token value='{{csrf_token()}}'>
        <!--Criterio de fecha-->
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Fecha de visualizacion</label>
            <input type="month" name="fecha" id="" class="form-control">
            @error('fecha')
                <small style="color: red;">{{$message}}</small>
            @enderror
        </div>
        <!--Boton enviar-->
        <div class="col-3">
            <label class="form-label" style="color: white;">........................</label>
            <button type="submit" class="btn btn-primary">Ver gastos operativos</button>
        </div>
    </form>
    <br>
    <h3 style="text-align: center;">Tabla de costos operativos </h3>
    <hr>
    <div class="col-md-8 d-flex justify-content-between" style="margin: auto;">
        @if(count($gastos)) 
        <table class="table table-bordered">
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
                    </td>
                    <td>{{$gasto->proveedor->nombre}}</td>
                    <td>{{date('m-Y',strtotime($gasto->fecha))}}</td>
                    <td>${{number_format($gasto->monto,2)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p style="margin: auto;">No hay gastos listados</p>
        @endif
    </div>
    <br>
</div>

@endsection