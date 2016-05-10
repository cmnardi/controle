<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            'id' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Saúde',
            'id' => 2
        ]);
        DB::table('category')->insert([
            'name' => 'Transporte',
            'id' => 3
        ]);
        DB::table('category')->insert([
            'name' => 'Mercado',
            'id' => 4
        ]);
        DB::table('category')->insert([
            'name' => 'Carro',
            'id' => 5
        ]);
    }
}
