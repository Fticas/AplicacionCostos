
<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ingresar nuevo Equipo
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('equipos.store')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingresar datos:</h5>
            </div>
            <!--Nombre de la unidad de medida-->
            <div class="col-md-2">
                <label for="fecha_compra_equipo" class="form-label">Fecha de compra del equipo</label>
                <input type="date" name="fecha_compra_equipo" value="{{old('fecha_compra_equipo')}}" class="form-control" >
                @error('fecha_compra_equipo')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-4">
            <label class="form-label">Proveedor</label>
            <select name="proveedor" id="" class="form-select">
                @foreach($proveedores as $proveedor)
                    @if($proveedor->tipo_proveedor == 'Equipos'||$proveedor->tipo_proveedor == 'Equipos y Materias Primas')
                    <option>{{$proveedor->nombre}}</option>
                    @endif
                @endforeach
            </select>
            @error('proveedor')
                <small style="color: red">{{$message}}</small>
            @enderror
            </div>
            <div class="col-md-2">
                <label for="nombre" class="form-label">Nombre del equipo</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="costo" class="form-label">Costo del equipo</label>
                <input type="text" name="costo" value="{{old('costo')}}" class="form-control" >
                @error('costo')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            
            
            <div class="col-2">
                <label for="vida_util" class="form-label">Vida Util: </label>
                <input type="text" name="vida_util" value="{{old('vida_util')}}" class="form-control" placeholder="Ingrese vida util (en meses):" >
                @error('vida_util')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripcion del equipo</label>
                <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" >
                @error('descripcion')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="col-md-8">
                
            </div>
            <br>
            <hr>
            <!--Boton enviar-->
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>