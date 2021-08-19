@if (isset($produto->id))
    <form method="post" action="{{route('produto.update', ['produto'=>$produto->id])}}">
    @method('PUT')
@else
    <form method="post" action="{{route('produto.store')}}">
@endif
    @csrf
    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}">
    {{$errors->has('nome') ? $errors->first('nome') : ''}}

    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value="{{$produto->descricao ?? old('descricao')}}">
    {{$errors->has('descricao') ? $errors->first('descricao') : ''}}

    <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="{{$produto->peso ??  old('peso')}}">
    {{$errors->has('peso') ? $errors->first('peso') : ''}}

    <select name="unidade_id">
        <option>Selecione uma unidade de medida</option>
        @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>
                {{$unidade->descricao}}
            </option>
        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

    <select name="fornecedor_id">
        <option>Selecione um fornecedor</option>
        @foreach ($fornecedores as $fornecedor)
            <option value="{{$fornecedor->id}}" {{($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>
                {{$fornecedor->nome}}
            </option>
        @endforeach
    </select>
    {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}

    <button type="submit" class="borda-preta"> Cadastrar </button>
</form>