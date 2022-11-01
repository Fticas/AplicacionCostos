@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    @include('proveedores.crear')

    <br>
    <!--tabla de unidades de medida-->
    <table class="table table-bordered">
        <h3 style="text-align: center;">Lista de proveedores</h3>
        <div style="border-style: outset;"></div>
        <br>

        @if(count($proveedores))
        <thead class="table-primary">
            <tr style="text-align: center;">
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Tipo de Proveedor</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($proveedores as $proveedor)
            <tr>
                <td>
                    <a href="{{route('proveedores.edit', $proveedor->id)}}" class="btn btn-success btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Editar informacion: {{$proveedor->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                    <a href="{{route('proveedores.edit', $proveedor->id)}}" class="btn btn-danger btn-sm shadow-none"
                        data-toggle="tooltip" data-placement="top"
                        title="Eliminar registro: {{$proveedor->nombre}}">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                </td>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->tipo_proveedor}}
                <td>{{$proveedor->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
        @else
        <p style="text-align: center">No hay proveedores listados</p>
        @endif

    </table>
    <br>
</div>

@endsection