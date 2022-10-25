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
}
