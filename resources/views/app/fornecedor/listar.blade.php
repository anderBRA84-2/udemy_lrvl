@extends('app.layouts.base')

@section('title','Fornecedores')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Fornecedor - Listar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
            <li> <a href="{{ route('app.fornecedores') }}">Consulta</a></li>

        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            .....LISTA......
        </div>
    </div>
</div>
@endsection
