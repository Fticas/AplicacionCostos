<br>
@if(count($ordenesproducto))
@php $total = 0; @endphp
<br>
<figcaption>
    <h5 style="text-align: center;">Productos incluidos en el pedido</h5>
</figcaption>
<br>
<table class="table">
    <thead class="table-primary">
        <tr>
            <th>Accion</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenesproducto as $ordenproducto)
        <tr>
            <td>
                @if($ordenproducto->asignado != 'Ingresado')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm shadow-none" title="No action" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-trash fa-fw text-white"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Accion no permitida</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    No es posible eliminar el producto de este pedido<br> 
                                    Este producto ya fue asignado a los operarios y se encuentra en su fase de elaboracdion
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <form action="{{route('ordenesproducto.destroy', $ordenproducto->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm shadow-none" title="Eliminar del pedido">
                        <i class="fa fa-trash fa-fw text-white"></i>
                    </button>
                </form>
                @endif
            </td>
            <td>{{$ordenproducto->producto->nombre}}</td>
            <td>{{$ordenproducto->cantidad}}</td>
            <td>$ {{number_format($ordenproducto->precio/$ordenproducto->cantidad, 2)}}</td>
            <td>$ {{number_format($ordenproducto->precio, 2)}}</td>
            @php  $total += $ordenproducto->precio; @endphp
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="text-align: right;">Total</th>
            <th>$ {{number_format($total, 2)}}</th>
        </tr>
    </tfoot>
</table>
@endif