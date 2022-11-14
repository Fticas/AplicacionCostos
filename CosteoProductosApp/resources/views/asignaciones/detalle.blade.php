@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div style="padding-left: 25px;">
        <div class="pull-right"style="background:transparent;">
            <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('asignaciones.index')}}"
                style="margin-top: 10px;margin-bottom: 10px;"> 
                <i class="fa fa-arrow-left" aria-hidden="true"> Atras</i>
            </a>
        </div>
    </div>
    <form action="" method="post" class="row g-3" style="padding: 25px;">
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
            <button type="submit" class="btn btn-primary">Consultar asignacion</button>
        </div>
    </form>

    <div style="width: 75%; margin: auto;">
        <figcaption style="text-align: center;">
            <h4>Tabla de asignacion de operarios</h4>
        </figcaption>
        <hr>
        <table class="table table-bordered">
            <div style="border-style: none;"></div>
            <br>
            @if(count($asignaciones))
            <thead class="table-primary" style="border-style: outset;">
                <tr style="text-align: center;">
                    
                    <th>Mes y año</th>
                    <th>Equipo</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach($asignaciones as $asignacion)
                <tr>
                    <td>{{date('m-Y',strtotime($depreciacion->fecha_depreciacion))}}</td>
                    <td></td>
                    <td>${{number_format(5,2)}}</td>
                </tr>
                @endforeach
            </tbody>
            @else
            <p style="text-align: center">No hay operarios listados</p>
            @endif
        </table>
    </div>
</div>

@endsection