<table class="table">
    <thead>
        <tr>
            <th class ="text-center" scope="col">Codigo</th>
            <th class ="text-center" scope="col">Nombre</th>
            <th class ="text-center" scope="col">Unidades en existencia</th>
            <th class ="text-center" scope="col">Unidad de medida base</th>
            <th class ="text-center" scope="col">Precio actual</th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class ="text-center" >{{$materiaprima->id}}</td>
            <td class ="text-center" >{{$materiaprima->nombre}}</td>
            <td class ="text-center" >{{$materiaprima->unidades_existencia}}</td>
            <td class ="text-center" >{{getNombreUnidadMedida($materiaprima->id_unidad_medida_base)}}</td>
            <td class ="text-center" >${{$materiaprima->precio_unitario}}</td>
        </tr>
    </tbody>
</table>