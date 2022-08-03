<br>
    <h4 class="text-center">Unidades de Medida</h4>
<br>
<table class="table" >
    <thead>
        <tr>
            @if($editable)
            <th class ="text-center" scope="col">Acciones</th>
            @endif
            <th class ="text-center" scope="col">Codigo</th>
            <th class ="text-center" scope="col">Nombre</th>
            <th class ="text-center" scope="col">Magnitud</th>
            <th class ="text-center" scope="col">Simbolo</th>
        </tr>
    </thead>`
    <tbody> 
            @if(count($unidadmedida))
            @foreach($unidadmedida as $um)
            
            <tr>
                @if($editable)
                <td class="text-center" width="20%">
                    <a href="{{Route('editar_unidad_medida', $um)}}" class="btn btn-success btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Editar Registro">
                        <i class="fa fa-pencil fa-fw text-white"></i></a>
                    </a>
                    <form action="{{Route('eliminar_unidad_medida', $um)}} " method="GET" class="d-inline-block">
                        <button id="delete" name="delete" type="submit" 
                                class="btn btn-danger btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                                onclick="return confirm('¿Estás seguro de eliminar?')">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </button>
                    </form>
                </td>
                @endif
                <td class ="text-center"scope="row">{{$um->id}}</td>
                <td class ="text-center"scope="row">{{$um->nombre}}</td>
                <td class ="text-center"scope="row">{{getNombreMagnitud($um->id_magnitud)}}</td>
                <td class ="text-center"scope="row">{{$um->simbolo}}</td> 
            </tr>
          @endforeach
          @else
          <tr>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
          </tr>
          @endif
        </tbody>
    </table>
    