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
            'name' => 'Outros',
            'id_category' => 8,
            'pattern' => '/.*/',
            'order' => 99999
        ]);
        DB::table('category')->insert([
            'name' => 'NET',
            'id_category' => 1,
            'pattern' => '/.net servicos*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Claro',
            'id_category' => 1,
            'pattern' => '/.Conta Telefone Claro.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Previdencia',
            'id_category' => 1,
            'pattern' => '/.Prudential.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Luz',
            'id_category' => 1,
            'pattern' => '/.eletropaulo.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Água',
            'id_category' => 1,
            'pattern' => '/.Sabest.*/',
            'order' => 1
        ]);

        //Banco
        DB::table('category')->insert([
            'name' => 'Empréstimo',
            'id_category' => 7,
            'pattern' => '/.Parc Cred Pess. */',
            'order' => 1
        ]);

        //saúde
        DB::table('category')->insert([
            'name' => 'Drogaria',
            'id_category' => 2,
            'pattern' => '/.*Droga.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Qualicorp',
            'id_category' => 2,
            'pattern' => '/.*Qualicorp.*/',
            'order' => 1
        ]);

        //transporte
        DB::table('category')->insert([
            'name' => 'Gasolina',
            'id_category' => 3,
            'pattern' => '/.*Posto|Petroleo.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Bilhete',
            'id_category' => 3,
            'pattern' => '/.*Metro.*/',
            'order' => 1
        ]);

        //carro
        DB::table('category')->insert([
            'name' => 'Daycoval',
            'id_category' => 5,
            'pattern' => '/.*Daycoval.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Borracharia',
            'id_category' => 5,
            'pattern' => '/.*Borracharia.*/',
            'order' => 1
        ]);
        


        //mercados
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
         DB::table('category')->insert([
            'name' => 'Carrefour',
            'id_category' => 4,
            'pattern' => '/.*Carrefour.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Assai',
            'id_category' => 4,
            'pattern' => '/.*Assai.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Futurama',
            'id_category' => 4,
            'pattern' => '/.*Futurama.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Tok Leve',
            'id_category' => 4,
            'pattern' => '/.*Tok Leve.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Wal Mart',
            'id_category' => 4,
            'pattern' => '/.*Wal Mart.*/',
            'order' => 1
        ]);


        //cachorros 
        DB::table('category')->insert([
            'name' => 'Ração',
            'id_category' => 6,
            'pattern' => '/.*Racoes Bom dia.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Cobasi',
            'id_category' => 6,
            'pattern' => '/.*Cobasi.*/',
            'order' => 1
        ]);
        DB::table('category')->insert([
            'name' => 'Cobasi',
            'id_category' => 6,
            'pattern' => '/.*PET.*/',
            'order' => 1
        ]);
    }
}
