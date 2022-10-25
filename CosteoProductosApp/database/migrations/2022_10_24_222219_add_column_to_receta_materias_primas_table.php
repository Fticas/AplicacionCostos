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
        Schema::table('receta_materias_primas', function (Blueprint $table) {
            $table->boolean('asignado')->after('unidad_medida_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receta_materias_primas', function (Blueprint $table) {
            $table->dropColumn('asignado');
        });
    }
};
