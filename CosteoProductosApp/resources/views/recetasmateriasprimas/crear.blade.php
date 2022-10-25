
<!--La informacion enviada por el formulario es diferente, y depende de la vista que lo llame-->
@if($nuevos_insumos)
<form action="{{route('recetasmateriasprimas.store')}}" method="post" class="row g-3" style="padding: 25px;">
    @csrf
@else
<form action="{{route('recetasmateriasprimas.update', $receta->id)}}" method="post" class="row g-3" style="padding: 25px;">
    @csrf
    @method('put')
@endif


    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <!--Encabezado del formulario-->
    <figcaption>
        @if($nuevos_insumos)
        <h5 style="text-align: center;">Seleccione la materia prima de la receta</h5>
        @else
        <h5 style="text-align: center;">Agregar materia prima a la receta</h5>
        @endif
    </figcaption>
    <!--Campo de materia prima-->
    <div class="col-md-4">
        <label for="" class="form-label">Materia prima</label>
        <select name="materiaprima" id="" class="form-select">
            @foreach($materiasprimas as $materiaprima)
            <option>{{$materiaprima->nombre}}</option>
            @endforeach
        </select>
    </div>
    <!--Campo de cantidad-->
    <div class="col-2">
        <label for="" class="form-label">Cantidad</label>
        <input type="text" name="cantidad" class="form-control" id="">
        @error('cantidad')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <!--Campo de unidad de medida-->
    <div class="col-md-3">
        <label for="inputEmail4" class="form-label">Unidad de medida</label>
        <select name="unidadmedida" id="" class="form-select">
            @foreach($unidadesmedida as $unidadmedida)
            <option>{{$unidadmedida->nombre}}</option>
            @endforeach
        </select>
    </div>
    <!--Boton agregar-->
    <div class="col-md-3">
        <label class="form-label" style="color: white;">.....................................</label>
        <input type="submit" value="Agregar a la receta" class="btn btn-primary">
    </div>
</form>
<br>