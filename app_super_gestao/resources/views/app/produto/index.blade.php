@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($produtos as $produto)
                        <tbody>
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td><a href="{{route('app.fornecedor.excluir', $produto->id)}}">Excluir</a></td>
                                <td><a href="{{route('app.fornecedor.editar', $produto->id)}}">Editar</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>

                {{$produtos->appends($request)->links()}}
                <br>
                Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} 
                (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
            </div>
        </div>
    </div>
@endsection