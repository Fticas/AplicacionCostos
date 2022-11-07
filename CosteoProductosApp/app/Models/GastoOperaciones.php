<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoOperaciones extends Model
{
    use HasFactory;
    protected $table = 'gasto_operaciones';
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
