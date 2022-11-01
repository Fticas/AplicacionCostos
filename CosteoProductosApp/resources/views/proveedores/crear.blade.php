
<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ingresar nuevo Proveedor
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('proveedores.store')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingresar datos:</h5>
            </div>
            <!--Nombre de la unidad de medida-->
            <div class="col-md-2">
                <label for="nombre" class="form-label">Nombre del proveedor</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            
            <div class="col-2">
                <label for="tipo_proveedor" class="form-label">Seleccionar tipo de proveedor: </label>
                <select name="tipo_proveedor" id="cars" class="form-select"> 
                    <option value ="" >Seleccione un proveedor</option>
                    <option value="Proveedor de equipo">Proveedor de Equipos</option> 
                    <option value="Proveedor de materia prima">Proveedor de Materia Prima</option>
                    <option value="Proveedor de materia prima y equipo">Proveedor de Materia Prima y equipos</option>
                </select>
                @error('tipo_proveedor')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            
            <div class="col-6">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" >
                @error('descripcion')
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