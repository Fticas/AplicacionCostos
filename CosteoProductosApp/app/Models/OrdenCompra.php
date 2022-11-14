<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $table = 'ordenes_compra';

    public function materia_prima(){
        return $this->belongsTo(MateriaPrima::class);
    }

    public function unidad_medida(){
        return $this->belongsTo(UnidadMedida::class);
    }
    public function compras(){
        return $this->belongsTo(Compras::class);
    }
}
