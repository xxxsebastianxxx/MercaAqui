<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_ventas', function (Blueprint $table) {
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('ventas_id');
            
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreign('ventas_id')->references('id')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos_ventas', function (Blueprint $table) {
            $table->dropColumn('productos_id');
            $table->dropColumn('ventas_id');
        });
    }
}
