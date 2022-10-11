<?php
    use App\Models\UnidadMedida;
    use App\Models\Magnitud;
    use App\Models\Conversion;
    use App\Models\MateriaPrima;
    use App\Models\Producto;
    use App\Models\Proveedor;

    /**
     * Devuelve el nombre de la unidad de medida
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreUnidadMedida($id){
        $unidadmedida = UnidadMedida::find($id);
        return $unidadmedida->nombre;
    }//usado

    /**
     * Devuelve el nombre de la magnitud
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreMagnitud($id){
        $magnitud = Magnitud::find($id);
        return $magnitud->nombre;
    }//usado

    /**
     * Devuelve el nombre de la magnitud de la unidad de medida especificada
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreMagnitudUnidadMedida($id){
        $unidadmedida = UnidadMedida::find($id);
        $magnitud = Magnitud::find($unidadmedida->magnitud_id);
        return $magnitud->nombre;
    }//usado

    /**
     * Devuelve el nombre de la magnitud
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreMateriaPrima($id){
        $materiaprima = MateriaPrima::find($id);
        return $materiaprima->nombre;
    }

    /**
     * Devuelve el nombre de la magnitud
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreProducto($id){
        $producto = Producto::find($id);
        return $producto->nombre;
    }

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

    function numeroConversiones($conversiones, $magnitud){
        $cantidad = 0;

        foreach($conversiones as $conversion){
            $unidadmedida = UnidadMedida::find($conversion->unidad_medida_inicial_id);
            if($unidadmedida->magnitud_id == $magnitud->id){
                $cantidad++;
            }
        }
        return $cantidad;
    }//usado

    /**
     * Crea instancias de la entidad conversion
     * @param $unidadmedida_referencia: unidad de medida de referencia
     */
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

    function obtenerFactorConversion($inicial, $final)
    {
        $conversiones = Conversion::All();
        foreach($conversiones as $conversion)
        {
            $condicion1 = $conversion->id_unidad_medida_inicial == $inicial;
            $condicion2 = $conversion->id_unidad_medida_final == $final;
            if($condicion1 && $condicion2)
            {
                return $conversion->factor_conversion;
            }
        }
    }

    function obtenerNombreProveedor($id){
        $proveedor = Proveedor::find($id);
        return $proveedor->nombre;
    }
?>