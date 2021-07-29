<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor novo';
        $fornecedor->site = 'fornecedor.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'email@email.com';
        $fornecedor->save();

        Fornecedor::create(['nome'=>'Fornecedor2',
            'site'=>'site.com.br',
            'uf'=>'RJ',
            'email'=>'email@email.com.br'
        ]);

        DB::table('fornecedores')->insert(['nome'=>'Fornecedor2',
            'site'=>'site.com.br',
            'uf'=>'RJ',
            'email'=>'email@email.com.br'
        ]);
    }
}
