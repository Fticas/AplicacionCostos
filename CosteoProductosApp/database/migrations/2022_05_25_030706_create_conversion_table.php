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
        Schema::create('conversion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_unidad_medida_inicial')->constrained('unidad_medida')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_unidad_medida_final')->constrained('unidad_medida')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->float('factor_conversion', 22, 10);
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
        Schema::dropIfExists('conversion');
    }
};
