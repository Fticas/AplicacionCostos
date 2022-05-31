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
        Schema::create('receta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')->constrained('producto')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_materia_prima')->constrained('materia_prima')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->float('cantidad', 22, 10);
            $table->foreignId('id_unidad_medida')->constrained('unidad_medida')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('receta');
    }
};
