<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'materias_primas';

    public function unidadMedida(){
        return $this->belongsTo(UnidadMedida::class);
    }
}
