<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'profile' => 'none_profile.jpg',
            'role_id' => 1
        ]);

        $writer = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'profile' => 'none_profile.jpg',
            'role_id' => 2
        ]);



        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        $rolePermission = Permission::create(['name' => 'Role access']);
        $rolePermission = Permission::create(['name' => 'Role edit']);
        $rolePermission = Permission::create(['name' => 'Role create']);
        $rolePermission = Permission::create(['name' => 'Role delete']);

        $userPermission = Permission::create(['name' => 'User access']);
        $userPermission = Permission::create(['name' => 'User edit']);
        $userPermission = Permission::create(['name' => 'User create']);
        $userPermission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);


        $permission = Permission::create(['name' => 'Category access']);
        $permission = Permission::create(['name' => 'Category edit']);
        $permission = Permission::create(['name' => 'Category create']);
        $permission = Permission::create(['name' => 'Category delete']);

        $tagPermission = Permission::create(['name' => 'Tag access']);
        $tagPermission = Permission::create(['name' => 'Tag edit']);
        $tagPermission = Permission::create(['name' => 'Tag create']);
        $tagPermission = Permission::create(['name' => 'Tag delete']);


        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);

        $dashboardPermission = Permission::create(['name' => 'Dashboard access']);

        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
