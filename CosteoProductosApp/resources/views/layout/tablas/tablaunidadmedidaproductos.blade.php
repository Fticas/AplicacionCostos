<table class="table table-bordered" style="width: 60%; margin:auto">
    <br>

    <thead class="table-primary">
        <tr style="text-align: center;">
            <th>Id</th>
            <th>Nombre</th>
            <th>Unidades existencia</th>
        </tr>
    </thead>
    @foreach($materias_primas as $materia_prima)

    @if($materia_prima->unidadMedida->id == $unidad_medida->id)
    <tbody style="text-align: center;">
        <tr>
            <td>{{$materia_prima->id}}</td>
            <td>{{$materia_prima->nombre}}</td>
            <td>{{$materia_prima->cantidad_existencia}}</td>
        </tr>
    </tbody>
    @endif
    @endforeach
</table>