<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;


class ventasTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_ventas()
    {
        $sql3 =DB::select("SELECT SUM(Precio_total) as Precio_final FROM ventas");
        


    }
}
