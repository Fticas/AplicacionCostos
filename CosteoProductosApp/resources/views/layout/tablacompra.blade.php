<br>
    <h4 class="text-center">Compras</h4>
<br>
<table class="table">
    <thead>
        <tr>
            @if($editable)
            <th class ="text-center" scope="col">Acciones</th>
            @endif
            <th class ="text-center" scope="col">Codigo</th>
            <th class ="text-center" scope="col">Proveedor</th>
            <th class ="text-center" scope="col">Fecha Compra</th>
            <th class ="text-center" scope="col">Total Compra</th>
        </tr>
    </thead>
    <tbody>
        @if(count($compras))
        @foreach($compras as $compra)
        <tr>
            @if($editable)
            <td class="text-center" width="20%">
                <a href="{{route('ver_orden_compra', $compra)}}" class="btn btn-primary btn-sm shadow-none" 
                        data-toggle="tooltip" data-placement="top" title="Ver Detalles de compra">
                    <i class="fa fa-book fa-fw text-white"></i></a>
                </a>
                <a href="{{route('editar_compra', $compra)}}" class="btn btn-success btn-sm shadow-none" 
                        data-toggle="tooltip" data-placement="top" title="Editar Registro">
                    <i class="fa fa-pencil fa-fw text-white"></i></a>
                </a>
                <form action="{{route('eliminar_compra', $compra)}}" method="GET" class="d-inline-block">
                    <button id="delete" name="delete" type="submit" 
                            class="btn btn-danger btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                            onclick="return confirm('¿Estás seguro de eliminar?')">
                        <i class="fa fa-trash-o fa-fw"></i>
                    </button>
                </form>
            </td>
            @endif
            <td class ="text-center" scope="col">{{$compra->id}}</td>
            <td class ="text-center" scope="col">{{obtenerNombreProveedor($compra->id_proveedor)}}</td>   <!--Obtener el nombre del proveedor-->
            <td class ="text-center" scope="col">{{$compra->fecha}}</td>
            <td class ="text-center" scope="col">${{number_format($compra->total, 2)}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            @if($editable)
            <td class ="text-center" scope="col">No hay registros</td>
            @endif
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
            <td class ="text-center" scope="col">No hay registros</td>
        </tr>
        @endif
    </tbody>
</table>