<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaMateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'receta_materias_primas';

    public function unidad_medida(){
        return $this->belongsTo(UnidadMedida::class);
    }

    public function materia_prima(){
        return $this->belongsTo(MateriaPrima::class);
    }
}
