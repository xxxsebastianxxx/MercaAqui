<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTgDeleteVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tg_delete_ventas
        BEFORE DELETE
        on ventas
        for EACH ROW
        begin
            INSERT into ctrl_ventas(
                id_ventas,
                created_at,
                updated_at,
                id_producto,
                Nombre_producto,
                Cantidad,
                Precio,
                Precio_total
            )
            values(
            (SELECT UNIX_TIMESTAMP(now())),
            old.created_at,
            old.updated_at,
            old.id_producto,
            old.Nombre_producto,
            old.Cantidad,
            old.Precio,
            old.Precio_total
            );
            end
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop trigger tg_delete_ventas');
    }
}
