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
        Schema::create('ordenes_materia_prima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receta_id')->constrained()->onUpdate('cascade')->nullable(true);
            $table->foreignId('materia_prima_id')->constrained('materias_primas')->onUpdate('cascade');
            $table->decimal('cantidad', 22, 10);
            $table->foreignId('unidad_medida_id')->constrained('unidades_medida')->onUpdate('cascade');
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
        Schema::dropIfExists('ordenes_materia_prima');
    }
};
