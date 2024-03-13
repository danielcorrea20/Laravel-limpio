<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos
        Permission::create(['name' => 'role-index', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-create', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-store', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-update', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-show', 'guard_name' => 'web']);
        Permission::create(['name' => 'role-destroy', 'guard_name' => 'web']);

        $super_administrador = Role::create(['name' => 'Super administrador']);
        $jefeEstudios = Role::create(['name' => 'Jefe de estudios']);
        $profesor = Role::create(['name' => 'Profesor']);
        $alumno = Role::create(['name' => 'Alumno']);

        $super_administrador->givePermissionTo(Permission::all());

        $user = User::find(1); //superadmin@superadmin.com
        $user->assignRole($super_administrador);

        $user_1 = User::find(2); //admin@admin.com
        $user_1->assignRole($jefeEstudios);

        $user_2 = User::find(3); 
        $user_2->assignRole($profesor);

        $user_3 = User::find(4); 
        $user_3->assignRole($alumno);
    }
}
