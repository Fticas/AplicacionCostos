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
        Schema::table('ordenes_producto', function (Blueprint $table) {
            $table->foreignId('producto_id')->after('pedido_id')->constrained()->onUpdate('cascade');
            $table->integer('cantidad')->after('producto_id');
            $table->decimal('precio', 22, 10)->after('cantidad');
            $table->boolean('asignado')->after('precio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes_producto', function (Blueprint $table) {
            $table->dropForeign(['producto_id']);
            $table->dropColumn('cantidad');
            $table->dropColumn('precio');
        });
    }
};
