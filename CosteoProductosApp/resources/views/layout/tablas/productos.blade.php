<table class="table table-bordered"`>
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio sugerido</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>$ {{number_format($producto->precio, 2)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>