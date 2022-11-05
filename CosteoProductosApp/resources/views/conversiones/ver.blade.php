@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div>
        <h5 style="text-align: center;">Factores de conversion</h5>
        <div style="border-style: outset;"></div>
        <br>
    </div>
    <div class="accordion" id="accordionExample" style="padding-left: 5%; padding-right: 5%;">
        @if(count($magnitudes))
        @foreach($magnitudes as $magnitud)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#a{{$magnitud->id}}" aria-expanded="false" aria-controls="a{{$magnitud->id}}">
                <h6>Factores para {{$magnitud->nombre}}</h6>
            </button>
            </h2>
            <div id="a{{$magnitud->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                    @foreach($magnitud->unidadesMedida as $unidadmedida)
                    <ul class="list-group">
                        @foreach($unidadmedida->conversiones as $um)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Conversion de {{$unidadmedida->nombre}} a {{$um->nombre}}:
                            @foreach($conversiones as $conversion)
                                @if($conversion->unidad_medida_inicial_id == $unidadmedida->id)
                                    @if($conversion->unidad_medida_final_id == $um->id)
                                        {{$conversion->factor_conversion}}
                                        <a href="{{route('conversiones.edit', $conversion->id)}}" class="btn btn-success btn-sm shadow-none"
                                        data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fa fa-pencil fa-fw text-white"></i>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                    @endforeach

                </div>
            </div>
        </div>
        @endforeach
        @else
        <p style="text-align: center;">
            No se tienen factores de conversion disponibles
            <br><br><br><br>
            <small>
                Nota: Los factores de conversion se crean automaticamente cuando existen doso mas unidades de
                medida la misma magnitud. 
            </small>
        </p>
        @endif
    </div>
</div>

@endsection