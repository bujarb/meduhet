<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cities')->insert(['name'=>'Ferizaj']);
        DB::table('cities')->insert(['name'=>'Prishtine']);
        DB::table('cities')->insert(['name'=>'Gjilan']);
        DB::table('cities')->insert(['name'=>'Prizren']);
        DB::table('cities')->insert(['name'=>'Gjakove']);
        DB::table('cities')->insert(['name'=>'Peje']);
        DB::table('cities')->insert(['name'=>'Mitrovice']);
        DB::table('cities')->insert(['name'=>'Therande']);
        DB::table('cities')->insert(['name'=>'Viti']);
        DB::table('cities')->insert(['name'=>'Kaqanik']);
    }
}
