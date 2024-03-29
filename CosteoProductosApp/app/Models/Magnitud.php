<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magnitud extends Model
{
    use HasFactory;

    protected $table = 'magnitudes';

    public function unidadesMedida(){
        return $this->hasMany(UnidadMedida::class);
    }
}
