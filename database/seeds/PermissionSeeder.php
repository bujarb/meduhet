<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission = Permission::create(['name' => 'add his products','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete his products','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update his products','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'add his needs','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete his needs','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update his needs','guard_name'=>'web']);



        // Permissions
        $permission = Permission::create(['name' => 'manage permissions','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'add permissions','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete permissions','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update permissions','guard_name'=>'web']);

        // Roles
        $permission = Permission::create(['name' => 'manage roles','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'add roles','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete roles','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update roles','guard_name'=>'web']);

        // Users
        $permission = Permission::create(['name' => 'manage users','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'add users','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete users','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update users','guard_name'=>'web']);

        // Products
        $permission = Permission::create(['name' => 'manage products','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete products','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update products','guard_name'=>'web']);

        // Needs
        $permission = Permission::create(['name' => 'manage needs','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete needs','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update needs','guard_name'=>'web']);

        // Cities
        $permission = Permission::create(['name' => 'manage cities','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'add cities','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete cities','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update cities','guard_name'=>'web']);

        // Categories
        $permission = Permission::create(['name' => 'manage categories','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'add categories','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'delete categories','guard_name'=>'web']);
        $permission = Permission::create(['name' => 'update categories','guard_name'=>'web']);
    }
}
