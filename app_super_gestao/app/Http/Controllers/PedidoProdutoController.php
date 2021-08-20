<?php

namespace App\Http\Controllers;
use App\{Pedido, Produto, PedidoProduto};

use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos;
        return view('app.pedido_produto.create', ['pedido'=>$pedido, 'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id'=>'exists:produtos,id',
            'quantidade'=>'required'
        ];
        $feedback = [
            'produto_id.exists'=>'Produto não localizado',
            'required'=>'O campo :attribute é obrigatório'
        ];
        $request->validate($regras, $feedback);

        /*$pedido_produto = new PedidoProduto();
        $pedido_produto->pedido_id = $pedido->id;
        $pedido_produto->produto_id = $request->get('produto_id');
        $pedido_produto->quantidade = $request->get('quantidade');
        $pedido_produto->save();*/

        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade'=>$request->get('quantidade')]
        ); 

        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  PedidoProduto $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //excluir todas as chaves relacionadas, independente do Id selecionado
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido_id]);
    }
}
