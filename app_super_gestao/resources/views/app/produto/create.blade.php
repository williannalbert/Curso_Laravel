@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto">
                <form method="post" action="{{route('produto.store')}}">
                    <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="">
                    

                    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value="">
                    

                    <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="">
                    
                    <select name="unidade_id" id="">
                        <option>Selecione uma unidade de medida</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    

                    <button type="submit" class="borda-preta"> Cadastrar </button>
                </form>
            </div>
        </div>
    </div>
@endsection