@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div class="pull-right"style="background:transparent;">
        <a class="btn btn-primary" data-placement="top" title="Regresar" href="{{route('gastosoperaciones.index', $gastos->id)}}" style="margin-top: 10px;margin-bottom: 10px;"> 
            <i class="fa fa-arrow-left" aria-hidden="true"> Regresar</i>
        </a>
    </div>
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('gastosoperaciones.update', $gastos)}}" method="POST" class="row g-3" style="padding: 25px;">
            @csrf
            @method('put')
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            
            <div>
                <h5 style="text-align: center;">Edite los campos que desea modificar</h5>
                <br>
            </div>

            <div class="col-md-4">
                <label class="form-label">Proveedor</label>
                <select name="proveedor" id="" class="form-select">
                    <option>{{$seleccionado->nombre}}</option>
                    @foreach($proveedores as $proveedor)
                        @if($proveedor->tipo_proveedor == 'Servicios'and $seleccionado->id !=$proveedor->id)
                        <option>{{$proveedor->nombre}}</option>
                        @endif
                    @endforeach
                </select>
                @error('proveedor')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="fecha" class="form-label">Fecha </label>
                <input type="month" name="fecha" value="{{$gastos->fecha}}" class="form-control" >
                @error('fecha')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="monto" class="form-label text-center">Gasto de monto </label>
                <input type="text" name="monto" value="{{number_format($gastos->monto,2)}}" class="form-control" >
                @error('monto')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection