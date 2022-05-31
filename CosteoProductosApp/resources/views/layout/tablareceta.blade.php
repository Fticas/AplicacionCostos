<p>
    <h4>Materia prima del producto</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Unidad de medida</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($recetas))
        @foreach($recetas as $receta)
        @if($receta->id_producto == $producto->id)
        <tr>
            <td>{{getNombreMateriaPrima($receta->id_materia_prima)}}</td>
            <td>{{$receta->cantidad}}</td>
            <td>{{getNombreUnidadMedida($receta->id_unidad_medida)}}</td>
            <td><a href="{{route('editar_receta', $receta)}}">editar</a></td>
            <td><a href="{{route('eliminar_receta', $receta)}}">eliminar</a></td>
        </tr>
        @endif
        @endforeach
        @else
        <tr>
            <td><p>No hay registros</p></td>
        </tr>
        @endif
    </tbody>
</table>