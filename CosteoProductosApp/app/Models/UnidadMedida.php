<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table = 'unidades_medida';

    public function magnitud(){
        return $this->belongsto(Magnitud::class);
    }

    public function conversiones(){
        return $this->belongsToMany(UnidadMedida::class, 'conversiones', 'unidad_medida_inicial_id', 'unidad_medida_final_id');
    }
}
