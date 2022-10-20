@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <div>
        <h5 style="text-align: center;">Factores de conversion</h5>
        <div style="border-style: outset;"></div>
        <br>
    </div>

    @foreach($magnitudes as $magnitud)
    <div class="accordion accordion-flush" id="accordionFlushExample" style="width: 80%; margin: auto;" >
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading{{$magnitud->nombre}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse{{$magnitud->nombre}}" aria-expanded="false" aria-controls="flush-collapseOne">
                <h5>Factores para {{$magnitud->nombre}}</h5>
            </button>
            </h2>
            <div id="flush-collapse{{$magnitud->nombre}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
    </div>
    @endforeach
</div>

@endsection