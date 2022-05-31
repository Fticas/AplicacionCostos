<br>
    <h4 class="text-center" >Conversiones de medida</h4>
<br>
<table class="table">
    <thead>
        <tr>
            <th class ="text-center"scope="col">Acciones</th>
            <th class ="text-center"scope="col">Unidad de medida inicial</th>
            <th class ="text-center"scope="col">Unidad de medida final</th>
            <th class ="text-center"scope="col">Factor de conversion</th>
            
        </tr>
    </thead>
    <tbody>
        @if(count($conversion))
        @foreach($conversion as $conv)
        <tr>
            <td class="text-center" width="20%">
                    <a href="{{route('editar_conversion', $conv)}}" class="btn btn-success btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Editar Registro">
                        <i class="fa fa-pencil fa-fw text-white"></i></a>
                    </a>
                    <form action="#" method="GET" class="d-inline-block">
                        <button id="delete" name="delete" type="submit" 
                                class="btn btn-danger btn-sm shadow-none" 
                                data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                                onclick="return confirm('¿Estás seguro de eliminar?')">
                            <i class="fa fa-trash-o fa-fw"></i>
                        </button>
                    </form>
                </td>
            <td class ="text-center"scope="col">{{getNombreUnidadMedida($conv->id_unidad_medida_inicial)}}</td>
            <td class ="text-center"scope="col">{{getNombreUnidadMedida($conv->id_unidad_medida_final)}}</td>
            <td class ="text-center"scope="col">{{$conv->factor_conversion}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class ="text-center"scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
        </tr>
        @endif
    </tbody>
</table>