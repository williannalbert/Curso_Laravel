<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivos_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos'=> $motivos_contatos]);
    }

    public function salvar(Request $request){
        $request->validate([
            'nome'=>'required|min:3|max:40',
            'telefone'=>'telefone',
            'email'=>'email',
            'motivo_contato'=>'motivo_contato',
            'mensagem'=>'mensagem',
        ]);
    }
}
