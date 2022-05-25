<p>
    <h4>Magnitud</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($magnitud))
        @foreach($magnitud as $mag)
        <tr>
            <td>{{$mag->id}}</td>
            <td>{{$mag->nombre}}</td>
            @if($editable)
            <td><a href="{{route('editar_magnitud', $mag)}}">editar</a></td>
            <td><a href="{{route('eliminar_magnitud', $mag)}}">eliminar</a></td>
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