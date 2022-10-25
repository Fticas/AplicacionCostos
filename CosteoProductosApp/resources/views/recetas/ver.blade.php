@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <h3 style="text-align: center;">Lista de recetas</h3>
    <div style="border-style: outset;"></div>
    <br>
    <div style="text-align: right;">
        <a href="{{route('recetas.create')}}" class="btn btn-light" data-toggle="tooltip" data-placement="top">Crear receta</a>
        <br>
        <br>
    </div>
    @if(count($recetas))
    <ul class="list-group">
        @foreach($recetas as $receta)
        <div style="padding: 0.25%;">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$receta->nombre}}
                <span>
                    <a href="{{route('recetas.show', $receta->id)}}" class="btn btn-primary btn-sm" title="Ver">
                        <i class="fa fa-book fa-fw text-white"></i>
                    </a>
                    <a href="{{route('recetas.edit', $receta->id)}}" class="btn btn-success btn-sm" title="Ver">
                        <i class="fa fa-pencil fa-fw text-white"></i>
                    </a>
                </span>
            </li>
        </div>
        @endforeach
    </ul>
    @else
    <p style="text-align: center">No se encontraron recetas</p>
    @endif
</div>

@endsection