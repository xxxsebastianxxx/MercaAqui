<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumsCtrlVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ctrl_ventas', function (Blueprint $table) {
            $table->integer('id_ventas');
            $table->integer('id_producto');
            $table->text('Nombre_producto');
            $table->integer('Cantidad');
            $table->bigInteger('Precio');
            $table->bigInteger('Precio_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ctrl_ventas', function (Blueprint $table) {
            $table->dropColumn('id_ventas');
            $table->dropColumn('id_producto');
            $table->dropColumn('Nombre_producto');
            $table->dropColumn('Cantidad');
            $table->dropColumn('Precio');
            $table->dropColumn('Precio_total');
        });
    }
}
