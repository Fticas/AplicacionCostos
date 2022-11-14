<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteCompras extends Model
{
    use HasFactory;

    protected $fillable =  ['fecha_inicio','fecha_final','producto','numero_compras','subtotal'];

}
