<h3>Fornecedores</h3>

@if (count($fornecedores) > 0 && count($fornecedores) <= 10)
    <h3>Alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) < 10)
    <h3>Vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não há fornecedores cadastrados</h3>
@endif

@isset($fornecedores)
    @for ($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{$fornecedores[$i]['nome']}}
        <br>
        Status: {{$fornecedores[$i]['status']}}
        <br>
        CNPJ: {{$fornecedores[$i]['cnpj'] ?? ''}}
        <br>
        Telefone: {{$fornecedores[$i]['ddd'] ?? ''}} {{$fornecedores[$i]['telefone'] ?? ''}}
        <br> 
        @switch($fornecedores[$i]['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @case('85')
                Fortaleza - CE
                @break
            @default
                Estado não identificado
        @endswitch 
    @endfor
@endisset

@isset($fornecedores)
    @php
        $i = 0;
    @endphp
    @while (isset($fornecedores[$i]))
    
    Fornecedor: {{$fornecedores[$i]['nome']}}
    <br>
    Status: {{$fornecedores[$i]['status']}}
    <br>
    CNPJ: {{$fornecedores[$i]['cnpj'] ?? ''}}
    <br>
    Telefone: {{$fornecedores[$i]['ddd'] ?? ''}} {{$fornecedores[$i]['telefone'] ?? ''}}
    <br> 
    @switch($fornecedores[$i]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('32')
            Juiz de Fora - MG
            @break
        @case('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado
    @endswitch 
    @php
        $i++;
    @endphp
    @endwhile
@endisset