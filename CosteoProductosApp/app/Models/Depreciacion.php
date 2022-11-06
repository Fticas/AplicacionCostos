<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depreciacion extends Model
{
    use HasFactory;
    protected $table = 'depreciaciones';
    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
}
