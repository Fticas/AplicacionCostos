@if(count($asignaciones))
<br>
<figcaption style="text-align: center;">
    <h5>Operarios asignados</h5>
</figcaption>
<table class="table" style="width: 50%; margin: auto;">
    <thead class="table-primary">
        <tr>
            <th>Operario</th>
            <th>Horas de trabajo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asignaciones as $asignacion)
        <tr>
            <td>{{$asignacion->operario->nombre . ' ' . $asignacion->operario->apellido}}</td>
            <td>{{$asignacion->horas_trabajadas}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
