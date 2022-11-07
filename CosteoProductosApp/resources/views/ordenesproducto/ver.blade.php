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
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenesproducto as $ordenproducto)
        <tr>
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
            <th colspan="3" style="text-align: right;">Total</th>
            <th>$ {{number_format($total, 2)}}</th>
        </tr>
    </tfoot>
</table>
@endif