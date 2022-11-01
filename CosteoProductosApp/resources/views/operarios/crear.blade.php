
<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ingresar nuevo Operario
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{route('operarios.store')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingresar datos:</h5>
            </div>
            <!--Nombre del operario-->
            <div class="col-md-3">
                <label for="nombre" class="form-label">Nombre del operario</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Apellido del operario-->
            <div class="col-md-3">
                <label for="apellido" class="form-label">Apellido del operario</label>
                <input type="text" name="apellido" value="{{old('apellido')}}" class="form-control" >
                @error('apellido')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Carnet-->
            <div class="col-md-2">
                <label for="carnet" class="form-label">Carnet del operario</label>
                <input type="text" name="carnet" value="{{old('carnet')}}" class="form-control" >
                @error('carnet')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Precio por hora-->
            <div class="col-2">
                <label for="precio_hora" class="form-label">Precio por hora: </label>
                <input type="text" name="precio_hora" value="{{old('precio_hora')}}" class="form-control" >
                @error('precio_hora')
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