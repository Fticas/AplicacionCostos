@php
    $total = 0;
@endphp
<!--Tabla de productos pertenecientes a la receta-->
<table class="table table-bordered"`>
    <thead class="table-primary">
        <tr style="text-align: center;">
            @if($editable)
            <th>Acciones</th>
            @endif
            <th>Materia prima</th>
            <th>Cantidad</th>
            <th>Unidad de medida</th>
            <th>Costo unitario</th>
            <th>Costo total</th>
        </tr>
    </thead>
    <tbody style="text-align: center;">
        @foreach($ordenescompras as $ordencompra)
        <tr>
            @if($editable)
            <td>
                <form action="{{route('ordenescompra.destroy', $ordencompra->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm shadow-none" title="Eliminar">
                        <i class="fa fa-trash fa-fw text-white"></i>
                    </button>
                </form>
            </td>
            @endif
            <td>{{$ordencompra->materia_prima->nombre}}</td>
            <td>{{$ordencompra->cantidad}}</td>
            <td>{{$ordencompra->unidad_medida->nombre}}</td>
            <td>$ {{number_format($ordencompra->costo_total/$ordencompra->cantidad, 2)}}</td>
            <td>$ {{number_format($ordencompra->costo_total, 2)}}</td>
        </tr>
        @php
            $total += $ordencompra->costo_total;
        @endphp
        @endforeach
    </tbody>
    <tfoot>
        @if($editable)
        <th colspan="5">Total de compra</th>
        @else
        <th colspan="4">Total de compra</th>
        @endif
        <th>$ {{number_format($total, 2)}}</th>
    </tfoot>
</table>