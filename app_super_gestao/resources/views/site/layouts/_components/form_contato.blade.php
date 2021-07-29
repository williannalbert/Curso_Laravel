{{ $slot }}

<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input type="text" placeholder="Nome" class="{{ $classe }}" name="nome">
    <br>
    <input type="text" placeholder="Telefone" class="{{ $classe }}"  name="telefone">
    <br>
    <input type="text" placeholder="E-mail" class="{{ $classe }}" name="email" >
    <br>
    <select class="{{ $classe }}" name="motivo_contato">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$key}}" {{old('motivo_contato')==$key ? "selected" : ""}}>{{$motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $classe }}" name="mensagem">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
