<table class="table">
    <thead>
        <tr>
            <th class ="text-center" scope="col">Cantidad</th>
            <th class ="text-center" scope="col">Codigo de producto</th>
            <th class ="text-center" scope="col">Descripcion de producto</th>
            <th class ="text-center" scope="col">Unidad medida</th>
            <th class ="text-center" scope="col">Precio unitario</th>
            <th class ="text-center" scope="col">Precio total</th>
        </tr>
    </thead>
    <tbody>
        @if(count($ordenescompara))
        @foreach($ordenescompara as $oc)
        <tr>
            <td class ="text-center" scope="col">{{$oc->cantidad}}</td>
            <td class ="text-center" scope="col">{{$oc->id_materia_prima}}</td>
            <td class ="text-center" scope="col">{{getNombreMateriaPrima($oc->id_materia_prima)}}</td>
            <td class ="text-center" scope="col">{{getNombreUnidadMedida($oc->id_unidad_medida)}}</td>\
            <td class ="text-center" scope="col">${{number_format($oc->precio_total / $oc->cantidad, 2)}}</td>
            <td class ="text-center" scope="col">${{number_format($oc->precio_total, 2)}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">    ---</td>
            <td class ="text-center" scope="col">    ---</td>
            <td class ="text-center" scope="col">    ---</td>
            <td class ="text-center" scope="col">    ---</td>
            <td class ="text-center" scope="col">    ---</td>
        </tr>
        @endif
    </tbody>
</table>