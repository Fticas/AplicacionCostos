<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;

    protected $table = 'conversiones';

    public function unidad_medida_inicial(){
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_inicial_id');
    }

    public function unidad_medida_final(){
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_final_id');
    }

    public static function encontrar($um_inicial, $um_final){
        $lista_conversiones = Conversion::where('unidad_medida_inicial_id', $um_inicial->id)->get();
        foreach($lista_conversiones as $conversion){
            if($conversion->unidad_medida_final_id == $um_final->id){
                return $conversion;
            }
        }
        return null;
    }
}
