<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name'=>'Telefona']);
        DB::table('categories')->insert(['name'=>'Vetura']);
        DB::table('categories')->insert(['name'=>'Prone']);
        DB::table('categories')->insert(['name'=>'Tablet']);
        DB::table('categories')->insert(['name'=>'Kompjuter']);
        DB::table('categories')->insert(['name'=>'Laptop']);
        DB::table('categories')->insert(['name'=>'Paisje Shtepiake']);
        DB::table('categories')->insert(['name'=>'Paisje per Telefona']);
    }
}
