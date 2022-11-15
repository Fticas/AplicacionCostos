<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function ordenes_compra(){
        return $this->hasMany(OrdenCompra::class);
    }

    public function total_compra(){
        $ordenes_compra = $this->ordenes_compra;
        $precio = 0.00;
        foreach($ordenes_compra as $orden_compra){
            $precio += $orden_compra->costo_total;
        }
        return $precio;
    } 
}
