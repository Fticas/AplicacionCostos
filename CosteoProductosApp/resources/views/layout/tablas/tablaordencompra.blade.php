<table class="table table-bordered"`>
    <figcaption class="titulos">Materia prima</figcaption>
    <thead class="table-primary">
        @yield('cabezadotabla')
        <tr>
            <th>Acciones</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Unidad de medida</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
        </tr>
    </thead>
    @if(count($compras))
    <tbody>
        <tr>
            <td>[000]</td>
            <td>Valor 2</td>
            <td>Valor 3</td>
            <td>Valor 4</td>
            <td>Valor 5</td>
            <td>Valor 6</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" style="text-align: right; padding-right: 75px;">Total Compra:</th>
            <th>$0.00</th>
        </tr>
    </tfoot>
    @else
    <tbody>
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
    </tbody>
    @endif
</table>