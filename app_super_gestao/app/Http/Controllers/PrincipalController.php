<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){

        $motivos_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        return view('site.principal', ['titulo' => 'Contato (teste)', 'motivo_contatos'=> $motivos_contatos]);
    }
}
