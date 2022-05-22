<p>
    <h4>Unidades de Medida</h4>
</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Unidad de medida inicial</th>
            <th scope="col">Unidad de medida final</th>
            <th scope="col">Factor de conversion</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(count($conversionmedida))
        @foreach($conversionmedida as $conversion)
        <tr>
            <td>{{$conversion->unidad_medida_inicial}}</td>
            <td>{{$conversion->unidad_medida_final}}</td>
            <td>{{$conversion->factor_conversion}}</td>
            @if($editable)
            <td><a href="{{Route('editar_conversion', $conversion)}}">editar</a></td>
            <td><a href="{{Route('eliminar_conversion', $conversion)}}">eliminar</a></td>
            @endif
        </tr>
        @endforeach
        @else
        <tr>
            <td><p>No hay registros</p></td>
        </tr>
        @endif
    </tbody>
</table>