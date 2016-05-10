<?php

use Illuminate\Database\Seeder;

class CategoryPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
            'name' => 'Casa',
            'id_category' => 1,
            'pattern' => '/.*/',
            'order' => 99999
        ]);
        DB::table('category')->insert([
            'name' => 'Drogasil',
            'id_category' => 2,
            'pattern' => '/.*Drogasil.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Gasolina',
            'id_category' => 3,
            'pattern' => '/.*Posto.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Bilhete',
            'id_category' => 3,
            'pattern' => '/.*SP Trans.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Extra',
            'id_category' => 4,
            'pattern' => '/.*Extra.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Padrão',
            'id_category' => 4,
            'pattern' => '/.*Padrao.*/',
            'order' => 1
        ]);
    }
}
