<br>
    <h4 class="text-center">Productos</h4>
<br>
<table class="table">
    <thead>
        <tr>
            @if($editable)
            <th class ="text-center" scope="col">Acciones</th>
            @endif
            <th class ="text-center" scope="col">Codigo</th>
            <th class ="text-center" scope="col">Nombre</th>
            <th class ="text-center" scope="col">Descripcion</th>
        </tr>
    </thead>
    <tbody>
        @if(count($productos))
        @foreach($productos as $producto)
        <tr>
            @if($editable)
            <td class="text-center" width="20%">
                <a href="{{route('mostrar_producto', $producto)}}" class="btn btn-primary btn-sm shadow-none" 
                        data-toggle="tooltip" data-placement="top" title="Ver Receta">
                    <i class="fa fa-book fa-fw text-white"></i></a>
                </a>
                <a href="{{route('editar_producto', $producto)}}" class="btn btn-success btn-sm shadow-none" 
                        data-toggle="tooltip" data-placement="top" title="Editar Registro">
                    <i class="fa fa-pencil fa-fw text-white"></i></a>
                </a>
                <form action="{{route('eliminar_producto', $producto)}}" method="GET" class="d-inline-block">
                    <button id="delete" name="delete" type="submit" 
                            class="btn btn-danger btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Eliminar Registro"
                            onclick="return confirm('¿Estás seguro de eliminar?')">
                        <i class="fa fa-trash-o fa-fw"></i>
                    </button>
                </form>
            </td>
            @endif
            <td class ="text-center" scope="col">{{$producto->id}}</td>
            <td class ="text-center" scope="col">{{$producto->nombre}}</td>
            <td class ="text-center" scope="col">{{$producto->descripcion}}</td>
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
        </tr>
        @endif
    </tbody>
</table>