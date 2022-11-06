<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto_operaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('costo_id')->nullable()->constrained('costos')->onUpdate('cascade');
            $table->foreignId('proveedor_id')->constrained('proveedores')->onUpdate('cascade');
            $table->decimal('monto',22,10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gasto_operaciones');
    }
};
