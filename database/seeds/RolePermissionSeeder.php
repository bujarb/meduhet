<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Admin Permissions
        for($i=1;$i<=32;$i++){
          DB::table('role_has_permissions')->insert(['permission_id'=>$i,'role_id'=>1]);
        }

        // Moderator Permissions
        for($i=1;$i<=6;$i++){
          DB::table('role_has_permissions')->insert(['permission_id'=>$i,'role_id'=>2]);
        }
        DB::table('role_has_permissions')->insert(['permission_id'=>15,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>18,'role_id'=>3]);
        DB::table('role_has_permissions')->insert(['permission_id'=>19,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>21,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>22,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>24,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>25,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>26,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>28,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>29,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>30,'role_id'=>2]);
        DB::table('role_has_permissions')->insert(['permission_id'=>32,'role_id'=>2]);


        // Users Permissions
        for($i=1;$i<=6;$i++){
          DB::table('role_has_permissions')->insert(['permission_id'=>$i,'role_id'=>4]);
        }

    }
}
