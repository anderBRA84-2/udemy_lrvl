@extends('app.layouts.base')

@section('title','Fornecedores')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Fornecedor</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
            <li> <a href="{{ route('app.fornecedores') }}">Consulta</a></li>

        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form method="POST" action="{{ route('app.fornecedores.listar') }}">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="email" class="borda-preta">
                <button type="submit" class="borda-preta">Consultar</button>
            </form>

        </div>
    </div>
</div>
@endsection
