@extends("layout.plantilla")

<?php
    use App\Models\UnidadMedida;

    /**
     * Devuelve el nombre de la unidad de medida
     * @param $unidadmedida: Array de unidades de medida
     * @param $val: id de la unidad de medida
     * @return String
     */
    function getNombreUnidadMedida($unidadmedida, $val){
        foreach($unidadmedida as $um){
            if($um->id == $val)
                return $um->nombre;
        }
        return "";
    }
?>

@section("contenido")

<div>
    @include("layout.tablaconversion")
</div>

@endsection