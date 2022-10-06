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
        Schema::create('conversiones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidad_medida_inicial_id')->constrained('unidades_medida')->onUpdate('cascade');
            $table->foreignId('unidad_medida_final_id')->constrained('unidades_medida')->onUpdate('cascade');
            $table->double('factor_conversion', 22, 10);
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
        Schema::dropIfExists('conversiones');
    }
};
