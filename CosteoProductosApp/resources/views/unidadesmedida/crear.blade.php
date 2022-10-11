
<p>
    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Crear Unidad de medida
    </a>
</p>
<div class="collapse" id="collapseExample">
    <div class="card" style="background-color: #F4F6F6;">
        <form action="{{url('/unidadesmedida')}}" method="post" class="row g-3" style="padding: 25px;">
            @csrf
            <input type="hidden" name=_token value='{{csrf_token()}}'>
            <!--Encabezado del formulario-->
            <div>
                <h5 style="text-align: center;">Ingrese los datos de la unidad de medida</h5>
            </div>
            <!--Nombre de la unidad de medida-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Nombre</label>
                <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" >
                @error('nombre')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Simbolo de la unidad de medida-->
            <div class="col-2">
                <label for="inputAddress" class="form-label">Simbolo</label>
                <input type="text" name="simbolo" value="{{old('simbolo')}}" class="form-control" >
                @error('simbolo')
                    <small style="color: red;">{{$message}}</small>
                @enderror
            </div>
            <!--Lista de magnitudes-->
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Magnitud</label>
                <select name="magnitud" class="form-select">
                        
                    @foreach($magnitudes as $magnitud)
                    <option>{{$magnitud->nombre}}</option>
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