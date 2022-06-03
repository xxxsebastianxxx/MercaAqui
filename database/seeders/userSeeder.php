<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create(['name'=>'David', 'email'=>'felipet.ft40@gmail.com','password'=> bcrypt('123456')])->assignRole('administrador');
        user::create(['name'=>'jose', 'email'=>'jose@gmail.com','password'=> bcrypt('123456')])->assignRole('usuario');
        user::factory(10)->create() ;
    }
}
