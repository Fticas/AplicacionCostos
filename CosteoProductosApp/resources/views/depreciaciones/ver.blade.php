@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">

    <br>
    <h3 style="text-align: center;">Tabla de depreciaciones </h3>
    <br>
    <hr>
    <br>
   <div class="col-md-8 d-flex justify-content-between">
    <table class="table table-bordered">
        
        <div style="border-style: none;"></div>
        <br>

        @if(count($depreciaciones))
        <thead class="table-primary" style="border-style: outset;">
            <tr style="text-align: center;">
                
                <th>Mes y año</th>
                <th>Equipo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($depreciaciones as $depreciacion)
             
            <tr>
                <td>{{date('m-Y',strtotime($depreciacion->fecha_depreciacion))}}</td>
                <td>{{$depreciacion->equipo->nombre}}</td>
                <td>${{number_format($depreciacion->valor,2)}}</td>
                
            </tr>
             
             
            @endforeach
        </tbody>
        @else
        <p style="text-align: center">No hay depreciaciones listados</p>
        @endif

    </table>
    </div>
    <br>
</div>

@endsection