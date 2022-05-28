<p>
    <h4>Unidades de Medida</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Magnitud</th>
            <th scope="col">Simbolo</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($unidadmedida))
        @foreach($unidadmedida as $um)
        <tr>
            <td>{{$um->id}}</td>
            <td>{{$um->nombre}}</td>
            <td>{{getNombreMagnitud($um->id_magnitud)}}</td>
            <td>{{$um->simbolo}}</td>
            @if($editable)
            <td><a href="{{route('editar_unidad_medida', $um)}}">editar</a></td>
            <td><a href="{{route('eliminar_unidad_medida', $um)}}">eliminar</a></td>
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