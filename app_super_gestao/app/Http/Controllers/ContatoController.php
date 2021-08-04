<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos'=> $motivo_contatos]);
    }

    public function salvar(Request $request){
        $request->validate([
            'nome'=>'required|min:3|max:40|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000',
        ],[
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 3 caracteres',
            'nome.unique' => 'O nome informado já foi utilizado',
            'email.email' => 'O email está com formato inválido',
            'mensagem.max' => 'Mensagem deve ter no máximo 2000 caracteres',

            'required' => 'O campo :attribute é obrigatório'
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
