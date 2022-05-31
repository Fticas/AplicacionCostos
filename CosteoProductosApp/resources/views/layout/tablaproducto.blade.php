<p>
    <h4>Productos</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($productos))
        @foreach($productos as $producto)
        <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            @if($editable)
            <td><a href="{{route('mostrar_producto', $producto)}}">Ver</a></td>
            <td><a href="{{route('editar_producto', $producto)}}">editar</a></td>
            <td><a href="{{route('eliminar_producto', $producto)}}">eliminar</a></td>
            @endif
        </tr>
        @endforeach
        @else
        <tr>
            <td><p>No hay registros</p></td>
        </tr>
        @endif
    </tbody>
</table>