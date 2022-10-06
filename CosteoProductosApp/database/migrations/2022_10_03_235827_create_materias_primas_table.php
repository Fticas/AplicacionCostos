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
        Schema::create('materias_primas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidad_medida_id')->constrained('unidades_medida')->onUpdate('cascade');
            $table->string('nombre', 30);
            $table->float('cantidad_existencia', 22, 10);
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
        Schema::dropIfExists('materias_primas');
    }
};
