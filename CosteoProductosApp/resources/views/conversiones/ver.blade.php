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
                @if(numeroConversiones($conversiones, $magnitud) > 0)
                <div id="flush-collapse{{$magnitud->nombre}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        @foreach($conversiones as $conversion)
                            <!--Imprimir solo las conversiondes de la magnitud-->
                            @if(getNombreMagnitudUnidadMedida($conversion->unidad_medida_inicial_id) == $magnitud->nombre)
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Conversion de {{getNombreUnidadMedida($conversion->unidad_medida_inicial_id)}} a
                                    {{getNombreUnidadMedida($conversion->unidad_medida_final_id)}}:
                                    {{$conversion->factor_conversion}}
                                    <a href="{{route('conversiones.edit', $conversion->id)}}" class="btn btn-success btn-sm shadow-none"
                                        data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fa fa-pencil fa-fw text-white"></i>
                                    </a>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                <div id="flush-collapse{{$magnitud->nombre}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        No se tienen registros
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endforeach
    <!--
    @foreach($magnitudes as $magnitud)
        <div>
            <br>
            <h5 style="text-align: center;">Factores para {{$magnitud->nombre}}</h5>
        </div>
        @if(numeroConversiones($conversiones, $magnitud) > 0)
            @foreach($conversiones as $conversion)
                @if(getNombreMagnitudUnidadMedida($conversion->unidad_medida_inicial_id) == $magnitud->nombre)
                <ul class="list-group" style="width: 75%; margin: auto;">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Conversion de {{getNombreUnidadMedida($conversion->unidad_medida_inicial_id)}} a
                        {{getNombreUnidadMedida($conversion->unidad_medida_final_id)}}:
                        {{$conversion->factor_conversion}}
                        <a href="" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Editar factor de conversion">
                            <i class="fa fa-pencil fa-fw text-white"></i>
                        </a>
                    </li>
                </ul>
                @endif
            @endforeach
        @else
        <div>
            <p style="text-align: center;">No se tienen registros</p>
        </div>
        @endif
    @endforeach-->
</div>

@endsection