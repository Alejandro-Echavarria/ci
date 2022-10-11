<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.home', 'description' => 'See darshboard'])->syncRoles([$admin, $user]);

        Permission::create(['name' => 'admin.colleges.index'  , 'description' => 'See colleges'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.colleges.create' , 'description' => 'Create colleges'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.colleges.edit'   , 'description' => 'Edit colleges'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.colleges.destroy', 'description' => 'Delete colleges'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.grades.index'    , 'description' => 'See grades'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grades.create'   , 'description' => 'Create grades'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grades.edit'     , 'description' => 'Edit grades'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.grades.destroy'  , 'description' => 'Delete grades'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.quaters.index'   , 'description' => 'See quaters'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'admin.quaters.create'  , 'description' => 'Create quaters'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'admin.quaters.edit'    , 'description' => 'Edit quaters'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'admin.quaters.destroy' , 'description' => 'Delete quaters'])->syncRoles([$admin, $user]);

        Permission::create(['name' => 'admin.user.index'      , 'description' => 'See users'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.user.create'     , 'description' => 'Create users'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.user.edit'       , 'description' => 'Edit users'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.user.destroy'    , 'description' => 'Delete users'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.roles.index'     , 'description' => 'See roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create'    , 'description' => 'Create roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit'      , 'description' => 'Edit roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.destroy'   , 'description' => 'Delete roles'])->syncRoles([$admin]);
    }
}
