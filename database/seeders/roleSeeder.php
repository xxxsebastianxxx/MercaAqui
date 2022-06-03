<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'usuario']);
        

        $permission = Permission::create(['name' => 'menuHome'])->syncRoles($role, $role2);
        $permission = Permission::create(['name' => 'verProductos'])->syncRoles($role, $role2);
        $permission = Permission::create(['name' => 'soloAdmin'])->syncRoles($role);
        $permission = Permission::create(['name' => 'soloUsuario'])->syncRoles($role2);
    }
}
