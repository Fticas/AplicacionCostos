<br>
@if(count($ordenespedido))
@php $total = 0; @endphp
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
        @foreach($ordenespedido as $ordenpedido)
        <tr>
            <td>{{$ordenpedido->producto->nombre}}</td>
            <td>{{$ordenpedido->cantidad}}</td>
            <td>$ {{number_format($ordenpedido->precio/$ordenpedido->cantidad, 2)}}</td>
            <td>$ {{number_format($ordenpedido->precio, 2)}}</td>
            @php  $total += $ordenpedido->precio; @endphp
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