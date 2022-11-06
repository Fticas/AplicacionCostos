
<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ingresar gastos operativos
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('gastosoperaciones.store')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingresar datos:</h5>
            </div>
            <!--energia de la unidad de medida-->
            <div class="col-md-2">
                <label for="fecha" class="form-label">Fecha </label>
                <input type="month" name="fecha" value="{{old('fecha')}}" class="form-control" >
                @error('fecha')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-4">
            <label class="form-label">Proveedor</label>
            <select name="proveedor" id="" class="form-select">
                @foreach($proveedores as $proveedor)
                    @if($proveedor->tipo_proveedor == 'Servicios')
                    <option>{{$proveedor->nombre}}</option>
                    @endif
                @endforeach
            </select>
            @error('proveedor')
                <small style="color: red">{{$message}}</small>
            @enderror
            </div>

            <div class="col-md-2">
                <label for="monto" class="form-label">Gasto de monto</label>
                <input type="text" name="monto" value="{{old('monto')}}" class="form-control" >
                @error('monto')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            

            

            <!--Boton enviar-->
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>