<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Unidades en existencia</th>
            <th scope="col">Unidad de medida base</th>
            <th scope="col">Precio actual</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$materiaprima->id}}</td>
            <td>{{$materiaprima->nombre}}</td>
            <td>{{$materiaprima->unidades_existencia}}</td>
            <td>{{getNombreUnidadMedida($materiaprima->id_unidad_medida_base)}}</td>
            <td>${{$materiaprima->precio_unitario}}</td>
        </tr>
    </tbody>
</table>