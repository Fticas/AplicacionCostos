<br>
    <h4 class="text-center">Unidades de Medida</h4>
<br>
<table class="table">
    <thead>
        <tr>
            <th class ="text-center" scope="col">Acciones</th>
            <th class ="text-center" scope="col">Nombre</th>
            <th class ="text-center" scope="col">Cantidad</th>
            <th class ="text-center" scope="col">Unidad de medida</th>
            
        </tr>
    </thead>
    <tbody>
        @if(count($recetas))
        @foreach($recetas as $receta)
        @if($receta->id_producto == $producto->id)
        <tr><td class="text-center" width="20%">
                    <a href="{{route('editar_receta', $receta)}}" class="btn btn-success btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Editar Registro">
                        <i class="fa fa-pencil fa-fw text-white"></i></a>
                    </a>
                    <form action="{{route('eliminar_receta', $receta)}} " method="GET" class="d-inline-block">
                        <button id="delete" name="delete" type="submit" 
                                class="btn btn-danger btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                                onclick="return confirm('¿Estás seguro de eliminar?')">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </button>
                    </form>
                </td>
            <td class ="text-center" scope="col">{{getNombreMateriaPrima($receta->id_materia_prima)}}</td>
            <td class ="text-center" scope="col">{{$receta->cantidad}}</td>
            <td class ="text-center" scope="col">{{getNombreUnidadMedida($receta->id_unidad_medida)}}</td>
        </tr>
        @endif
        @endforeach
        @else
        <tr>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
        </tr>
        @endif
    </tbody>
</table>