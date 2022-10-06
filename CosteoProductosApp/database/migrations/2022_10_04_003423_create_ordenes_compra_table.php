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
        Schema::create('ordenes_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained()->onUpdate('cascade');
            $table->foreignId('materia_prima_id')->constrained('materias_primas')->onUpdate('cascade');
            $table->integer('cantidad');
            $table->foreignId('unidad_medida_id')->constrained('unidades_medida')->onUpdate('cascade');
            $table->decimal('costo_total', 22, 10);
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
        Schema::dropIfExists('ordenes_compra');
    }
};
