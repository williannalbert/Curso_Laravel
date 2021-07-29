<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$contato = new SiteContato();
        $contato->nome = 'Sistema Sg';
        $contato->telefone = '11 248545784';
        $contato->email = 'contato@email.com';
        $contato->motivo_contato = '2';
        $contato->mensagem = 'mensagem de contato';
        $contato->save();*/

        factory(SiteContato::class, 100)->create();
    }
}
