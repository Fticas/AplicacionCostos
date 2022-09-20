<p>
    <h4>Mano de obra</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio por hora</th>
            <th scope="col"></th>
            <th scope="col">Acciones</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($operario))
        @foreach($operario as $op)
        <tr>
            <td>{{$op->id}}</td>
            <td>{{$op->nombre}}</td>
            <td>$  {{$op->pago_hora}}</td>
            @if($editable)
            <td><a href="{{route('editar_operario', $op)}}">editar</a></td>
            <td><a href="{{route('eliminar_operario', $op)}}">eliminar</a></td>
            <th scope="col"></th>
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