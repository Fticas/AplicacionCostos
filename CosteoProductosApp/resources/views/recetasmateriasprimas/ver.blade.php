<!--Tabla de productos pertenecientes a la receta-->
<table class="table table-bordered"`>
    <thead class="table-primary">
        <tr style="text-align: center;">
            <th>Cantidad</th>
            <th>Unidad de medida</th>
            <th>Materia prima</th>
            @if($editable)
            <th>Accion</th>
            @endif
        </tr>
    </thead>
    <tbody style="text-align: center;">
        @foreach($recetasmateriasprimas as $recetamateriaprima)
        <tr>
            <td>{{$recetamateriaprima->cantidad}}</td>
            <td>{{$recetamateriaprima->unidad_medida->nombre}}</td>
            <td>{{$recetamateriaprima->materia_prima->nombre}}</td>
            @if($editable)
            <td>
                <form action="{{route('recetasmateriasprimas.destroy', $recetamateriaprima->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm shadow-none" title="Eliminar {{$recetamateriaprima->materia_prima->nombre}}">
                        <i class="fa fa-trash fa-fw text-white"></i>
                    </button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>