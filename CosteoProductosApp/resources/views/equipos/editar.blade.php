@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('equipos.index', $equipos->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('equipos.update', $equipos)}}" method="POST" class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <input type="hidden" name= "vida_util_restante" value='{{$equipos->vida_util_restante}}'>
            <input type="hidden" name= "depreciacion_total" value='{{$equipos->depreciacion_total}}'>
            <input type="hidden" name= "depreciacion_mensual" value='{{$equipos->depreciacion_mensual}}'>
            <div>
                <h5 style="text-align: center;">Edite los campos que desea modificar</h5>
                <br>
            </div>

            <div class="col-md-2">
                <label for="fecha_compra_equipo" class="form-label">Fecha de compra del equipo</label>
                <input type="date" name="fecha_compra_equipo" value="{{$equipos->fecha_compra_equipo}}" class="form-control" >
                @error('fecha_compra_equipo')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-4">
            <label class="form-label">Proveedor</label>
            <select name="proveedor" id="" class="form-select">
                <option>{{$seleccionado->nombre}}</option>
                @foreach($proveedores as $proveedor)
                    @if($proveedor->tipo_proveedor == 'Equipos'||$proveedor->tipo_proveedor == 'Equipos y Materias Primas'and $seleccionado->id !=$proveedor->id)
                    <option>{{$proveedor->nombre}}</option>
                    @endif
                @endforeach
            </select>
            @error('proveedor')
                <small style="color: red">{{$message}}</small>
            @enderror
            </div>

            <div class="col-md-2">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{$equipos->nombre}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            

            <div class="col-md-2">
                <label for="costo" class="form-label">Costo del equipo</label>
                <input type="text" name="costo" value="{{number_format($equipos->costo,2)}}" class="form-control" >
                @error('costo')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="vida_util" class="form-label">Vida util del equipo</label>
                <input type="text" name="vida_util" value="{{number_format($equipos->vida_util, 2)}}" class="form-control" >
                @error('vida_util')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripcion del equipo</label>
                <input type="text" name="descripcion" value="{{$equipos->descripcion}}" class="form-control" >
                @error('descripcion')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-8">
                
            </div>
            <br>
            <hr>
            
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection