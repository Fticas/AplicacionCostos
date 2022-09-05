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
    }

    /**
     * Devuelve el nombre de la magnitud
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreMagnitud($id){
        $magnitud = Magnitud::find($id);
        return $magnitud->nombre;
    }

    /**
     * Devuelve el nombre de la magnitud de la unidad de medida especificada
     * @param $id: id de la unidad de medida
     * @return String
     */
    function getNombreMagnitudUnidadMedida($id){
        $unidadmedida = UnidadMedida::find($id);
        $magnitud = Magnitud::find($unidadmedida->id_magnitud);
        return $magnitud->nombre;
    }

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
     * @param $um_referencia: unidad de medida de referencia
     */
    function crearFactoresConversion($um_referencia)
    {
        $unidadmedida = UnidadMedida::All();
        foreach($unidadmedida as $um){
            $condicion1 = $um->id != $um_referencia->id;
            $condicion2 = $um->id_magnitud == $um_referencia->id_magnitud;
            if($condicion1 && $condicion2){
                crearInstanciaConversion($um, $um_referencia);
                crearInstanciaConversion($um_referencia, $um);
            }
        }
    }

    /**
     * Crea una instancia de la entidad conversion
     * @param $um1: unidad de medida 1
     * @param $um2: unidad de medida 2
     */
    function crearInstanciaConversion($um1, $um2)
    {
        $conversion = new Conversion();
        $conversion->id_unidad_medida_inicial = $um1->id;
        $conversion->id_unidad_medida_final = $um2->id;
        $conversion->factor_conversion = 1.00;
        $conversion->save();
    }

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