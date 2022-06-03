<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumsVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->integer('id_producto');
            $table->text('Nombre_producto');
            $table->integer('Cantidad');
            $table->integer('Precio');
            $table->integer('Precio_total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropColumn('id_producto');
            $table->dropColumn('Nombre_producto');
            $table->dropColumn('Cantidad');
            $table->dropColumn('Precio');
            $table->dropColumn('Precio_total');
        });
    }
}
