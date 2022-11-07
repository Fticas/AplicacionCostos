<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProducto extends Model
{
    use HasFactory;

    protected $table = 'ordenes_producto';

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
