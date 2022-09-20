<br>
    <h4 class="text-center">Compras</h4>
<br>
<table class="table">
    <thead>
        <tr>
            <th class ="text-center" scope="col">Ver Compra</th>
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
            <td class="text-center" width="20%">
                <a href="{{route('ver_orden_compra', $compra)}}" class="btn btn-primary btn-sm shadow-none" 
                        data-toggle="tooltip" data-placement="top" title="Ver Detalles de compra">
                    <i class="fa fa-book fa-fw text-white"></i></a>
                </a>
            </td>
            <td class ="text-center" scope="col">{{$compra->id}}</td>
            <td class ="text-center" scope="col">{{obtenerNombreProveedor($compra->id_proveedor)}}</td>   <!--Obtener el nombre del proveedor-->
            <td class ="text-center" scope="col">{{$compra->fecha}}</td>
            <td class ="text-center" scope="col">${{number_format($compra->total, 2)}}</td>
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