@extends('layout.plantillaprincipal')

@section('contenido')

<div style="padding: 20px;">
    <h3 style="text-align: center;">Registro de Compras</h3>
    <div style="border-style: outset;"></div>
    <br>
    <div style="text-align: right;">
        <a href="{{route('compras.create')}}" class="btn btn-light" data-toggle="tooltip" data-placement="top">Agregar una compra</a>
        <br>
        <br>
    </div>
    <div class="accordion" id="accordionExample" style="padding-left: 5%; padding-right: 5%;">
        @if(count($compras))
        @foreach($compras as $compra)
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#a{{$compra->id}}" aria-expanded="false" aria-controls="a{{$compra->id}}">
                Fecha de compra: {{$compra->fecha_compra}}
            </button>
            </h2>
            <div id="a{{$compra->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>No de factura: {{$compra->no_factura}}</strong><br>
                    Proveedor de la compra: {{$compra->proveedor->nombre}} <br>
                    Total de compra: $ {{$compra->total_compra()}} <br><br>
                    <a href="{{route('compras.show', $compra->id)}}">
                        <button type="button" class="btn btn-secondary">Ver detalle de compra</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p style="text-align: center;">No hay registro de compras</p>
        @endif
    </div>
</div>

@endsection