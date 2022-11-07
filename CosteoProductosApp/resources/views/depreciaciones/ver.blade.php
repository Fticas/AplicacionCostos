@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <form action="{{route('depreciaciones.store')}}" method="post" class="row g-3" style="padding: 25px;">
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
        <div class="col-2">
            <label class="form-label" style="color: white;">........................</label>
            <button type="submit" class="btn btn-primary">Ver depreciacion</button>
        </div>
    </form>
    <div style="width: 75%; margin: auto;">
        <figcaption style="text-align: center;">
            <h4>Tabla de depreciaciones</h4>
        </figcaption>
        <hr>
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
</div>

@endsection