<br>
    <h4 class="text-center">Productos</h4>
<br>
<table class="table">
    <thead>
        <tr>
            <th class ="text-center" scope="col">Acciones</th>
            <th class ="text-center" scope="col">Codigo</th>
            <th class ="text-center" scope="col">Nombre</th>
            <th class ="text-center" scope="col">Descripcion</th>
            <th class ="text-center" scope="col">Imprevisto</th>
        </tr>
    </thead>
    <tbody>
        @if(count($productos))
        @foreach($productos as $producto)
        <tr>
            <td class="text-center" width="20%">
                    <a href="{{route('mostrar_producto', $producto)}}" class="btn btn-primary btn-sm shadow-none" 
                            data-toggle="tooltip" data-placement="top" title="Ver Registro">
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
            <td class ="text-center" scope="col">{{$producto->id}}</td>
            <td class ="text-center" scope="col">{{$producto->nombre}}</td>
            <td class ="text-center" scope="col">{{$producto->descripcion}}</td>
            <td class ="text-center" scope="col">{{$producto->imprevisto}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class ="text-center"scope="row"> NO HAY REGISTROS</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endif
    </tbody>
</table>