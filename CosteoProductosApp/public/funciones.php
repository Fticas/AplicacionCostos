<?php
    use App\Models\UnidadMedida;
    use App\Models\Magnitud;

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

    /**
     * Devuelve el nombre de la magnitud
     * @param $magnitud: Array de unidades de medida
     * @param $val: id de la unidad de medida
     * @return String
     */
    function getNombreMagnitud($magnitudes, $val){
        foreach($magnitudes as $magnitud){
            if($magnitud->id == $val)
                return $magnitud->nombre;
        }
        return "";
    }
?>