<?php
    use App\Models\UnidadMedida;
    use App\Models\Magnitud;
    use App\Models\Conversion;
    use App\Models\MateriaPrima;
    use App\Models\Producto;
    use App\Models\Proveedor;

    /**
     * Crea instancias de la entidad conversion
     * @param $um_nueva: unidad de medida de referencia
     */
    function crearFactoresConversion($um_nueva)
    {
        $unidadesmedida = UnidadMedida::All();
        foreach($unidadesmedida as $unidadmedida){
            $condicion1 = $unidadmedida->id != $um_nueva->id;
            $condicion2 = $unidadmedida->magnitud_id == $um_nueva->magnitud_id;
            if($condicion1 && $condicion2){
                crearInstanciaConversion($unidadmedida, $um_nueva);
                crearInstanciaConversion($um_nueva, $unidadmedida);
            }
        }
    }//usado

    /**
     * Crea una instancia de la entidad conversion
     * @param $um1: unidad de medida 1
     * @param $um2: unidad de medida 2
     */
    function crearInstanciaConversion($um1, $um2)
    {
        $conversion = new Conversion();
        $conversion->unidad_medida_inicial_id = $um1->id;
        $conversion->unidad_medida_final_id = $um2->id;
        $conversion->factor_conversion = 1.00;
        $conversion->save();
    }//usado


    function eliminarFactoresConversion($um_referencia)
    {
        $conversion = Conversion::All();
        foreach($conversion as $conv)
        {
            $condicion1 = $conv->id_unidad_medida_inicial == $um_referencia->id;
            $condicion2 = $conv->id_unidad_medida_final == $um_referencia->id;
            if($condicion1 || $condicion2)
            {
                $conv->delete();
            }
        }
    }
?>