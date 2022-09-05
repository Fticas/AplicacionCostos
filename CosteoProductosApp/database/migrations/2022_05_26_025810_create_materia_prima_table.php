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
        Schema::create('materia_prima', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->float('unidades_existencia', 22, 10);
            $table->foreignId('id_unidad_medida_base')->constrained('unidad_medida')->onUpdate('cascade')->onDelete('cascade');
            $table->double('precio_unitario', 22, 10);
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
        Schema::dropIfExists('materia_prima');
    }
};
