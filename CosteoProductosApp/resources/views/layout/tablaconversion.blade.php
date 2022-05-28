<p>
    <h4>Conversiones de Medida</h4>
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
        @if(count($conversion))
        @foreach($conversion as $conv)
        <tr>
            <td>{{getNombreUnidadMedida($conv->id_unidad_medida_inicial)}}</td>
            <td>{{getNombreUnidadMedida($conv->id_unidad_medida_final)}}</td>
            <td>{{$conv->factor_conversion}}</td>
            <td><a href="{{route('editar_conversion', $conv)}}">editar</a></td>
        </tr>
        @endforeach
        @else
        <tr>
            <td><p>No hay registros</p></td>
        </tr>
        @endif
    </tbody>
</table>