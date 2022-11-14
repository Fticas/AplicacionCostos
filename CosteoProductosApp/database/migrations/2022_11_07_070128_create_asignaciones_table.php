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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operario_id')->constrained()->onUpdate('cascade');
            $table->foreignId('producto_id')->onUpdate('cascade')->nullable(true);
            $table->foreignId('costo_id')->constrained()->onUpdate('cascade')->nullable(true);
            $table->integer('horas_trabajadas');
            $table->date('fecha_asignacion');
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
        Schema::dropIfExists('asignaciones');
    }
};
