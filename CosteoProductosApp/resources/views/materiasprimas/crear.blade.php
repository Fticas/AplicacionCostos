<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Crear Materia Prima 
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('materiasprimas.store')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingrese los datos de la materia prima</h5>
            </div>
            <!--Nombre de la materia prima-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Lista de unidades de medida-->
            <div class="col-md-3">
                <label class="form-label">Unidad de medida base</label>
                <select name="unidadmedida" class="form-select">        
                    @foreach($unidades_medida as $unidad_medida)
                    <option>{{$unidad_medida->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <!--Boton enviar-->
            <div class="col-2">
                <label class="form-label" style="color: white;">........................</label>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>