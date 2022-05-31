<p>
    <h4>Materia Prima</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Unidades en existencia</th>
            <th scope="col">Unidad de medida base</th>
            <th scope="col">Precio unitario</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($materiaprima))
        @foreach($materiaprima as $mp)
        <tr>
            <td>{{$mp->id}}</td>
            <td>{{$mp->nombre}}</td>
            <td>{{$mp->unidades_existencia}}</td>
            <td>{{getNombreUnidadMedida($mp->id_unidad_medida_base)}}</td>
            <td>${{$mp->precio_unitario}}</td>
            @if($editable)
            <td><a href="{{route('mostrar_materia_prima', $mp)}}">compra</a></td>
            <td><a href="{{route('editar_materia_prima', $mp)}}">editar</a></td>
            <td><a href="{{route('eliminar_materia_prima', $mp)}}">eliminar</a></td>
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