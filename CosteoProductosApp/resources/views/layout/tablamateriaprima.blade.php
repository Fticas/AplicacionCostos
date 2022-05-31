
<br  >
    <h4 class="text-center">Materia Prima</h4>
<br>
<table class="table">
    <thead>
        <tr>
            <th class ="text-center" scope="col">Acciones</th>
            <th class ="text-center" scope="col">Codigo</th>
            <th class ="text-center" scope="col">Nombre</th>
            <th class ="text-center" scope="col">Unidades en existencia</th>
            <th class ="text-center" scope="col">Unidad de medida base</th>
            <th class ="text-center" scope="col">Precio unitario</th>
        </tr>
    </thead>
    <tbody>
        @if(count($materiaprima))
        @foreach($materiaprima as $mp)
        <tr>
            <td class="text-center" width="20%">
                    <a href="{{route('mostrar_materia_prima', $mp)}}" class="btn btn-primary btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Compra">
                        <i class="fa fa-book fa-fw text-white"></i></a>
                    </a>
                    <a href="{{route('editar_materia_prima', $mp)}}" class="btn btn-success btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Editar Registro">
                        <i class="fa fa-pencil fa-fw text-white"></i></a>
                    </a>
                    <form action="{{route('eliminar_materia_prima', $mp)}}" method="GET" class="d-inline-block">
                        <button id="delete" name="delete" type="submit" 
                                class="btn btn-danger btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                                onclick="return confirm('¿Estás seguro de eliminar?')">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </button>
                    </form>
            </td>
            <td class ="text-center" scope="col">{{$mp->id}}</td>
            <td class ="text-center" scope="col">{{$mp->nombre}}</td>
            <td class ="text-center" scope="col">{{$mp->unidades_existencia}}</td>
            <td class ="text-center" scope="col">{{getNombreUnidadMedida($mp->id_unidad_medida_base)}}</td>
            <td class ="text-center" scope="col">${{$mp->precio_unitario}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class ="text-center"scope="row"> No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
          </tr>
        @endif
    </tbody>
</table>