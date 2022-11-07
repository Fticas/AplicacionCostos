<br>
<figcaption>
    <h5 style="text-align: center;">Seleccione el producto</h5>
</figcaption>
<br>
<form action="{{route('ordenesproducto.store')}}" method="post" class="row gy-2 gx-3 align-items-center">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <div class="col-1">
        <!-- Boton trigger modal -->
        <label class="form-label">Buscar</label>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa fa-search-minus" aria-hidden="true"></i>
        </button>

        <!-- Contenido Modal-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Lista de productos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('layout.tablas.productos')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <label class="form-label">Producto</label>
        <select name="producto" class="form-select" id="autoSizingSelect">
            @foreach($productos as $producto)
            <option>{{$producto->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <label class="form-label">Cantidad</label>
        <input type="text" name="cantidad" class="form-control" placeholder="Cantidad">
        @error('cantidad')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div class="col-2">
        <label class="form-label">Precio por unidad</label>
        <input type="text" name="precio" class="form-control" placeholder="Precio unitario">
        @error('precio')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div class="col-2">
        <label class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="submit" value="Agregar producto" class="btn btn-primary">
    </div>
</form>