
<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Nuevo Proveedor
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('proveedores.store')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingrese los datos del nuevo proveedor:</h5>
            </div>
            <!--Nombre del proveedor-->
            <div class="col-md-5">
                <label for="nombre" class="form-label">Nombre del proveedor</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Tipo de proveedor-->
            <div class="col-5">
                <label for="tipo_proveedor" class="form-label">Seleccionar tipo de proveedor: </label>
                <select name="tipo_proveedor" id="cars" class="form-select">
                    <option>Equipos</option> 
                    <option>Materias Primas</option>
                    <option>Equipos y Materia Prima</option>
                </select>
                @error('tipo_proveedor')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Descripcion del proveedor-->
            <div class="col-10">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" id="" cols="30" rows="3" class="form-control">{{old('descripcion')}}</textarea>
                @error('descripcion')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Boton enviar-->
            <div class="col-4">
                <label class="form-label" style="color: white;"></label>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>