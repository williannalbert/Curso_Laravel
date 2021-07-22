<h3>Fornecedores</h3>

@if (count($fornecedores) > 0 && count($fornecedores) <= 10)
    <h3>Alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) < 10)
    <h3>Vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não há fornecedores cadastrados</h3>
@endif

@isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
@endisset