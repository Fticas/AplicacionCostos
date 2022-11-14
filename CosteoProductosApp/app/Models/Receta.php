<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    public function materias_primas(){
        return $this->belongsToMany(MateriaPrima::class, 'receta_materias_primas');
    }

    public function recetas_materias_primas(){
        return $this->hasMany(RecetaMateriaPrima::class);
    }
}
