<?php

use Illuminate\Database\Seeder;

class ModelPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Super Admin Permissions
      for($i=1;$i<=32;$i++){
        DB::table('model_has_permissions')->insert(['permission_id'=>$i,'model_id'=>1,'model_type'=>'App\User']);
      }

      // Adminstrator Permissions
      for($i=1;$i<=6;$i++){
        DB::table('model_has_permissions')->insert(['permission_id'=>$i,'model_id'=>2,'model_type'=>'App\User']);
      }
      DB::table('model_has_permissions')->insert(['permission_id'=>15,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>18,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>19,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>21,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>22,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>24,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>25,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>26,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>28,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>29,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>30,'model_id'=>2,'model_type'=>'App\User']);
      DB::table('model_has_permissions')->insert(['permission_id'=>32,'model_id'=>2,'model_type'=>'App\User']);


      // Users Permissions
      for($i=1;$i<=6;$i++){
        DB::table('model_has_permissions')->insert(['permission_id'=>$i,'model_id'=>4,'model_type'=>'App\User']);
      }
    }
}
