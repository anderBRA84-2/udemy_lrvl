<h2>Fornecedores</h2>
<br>
{{-- @dd($fornecedores);--}}
    @isset($fornecedores)
    @for ($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedores: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
        <br>
        <br>
    @endfor



    @endisset


