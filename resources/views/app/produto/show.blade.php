@extends('app.layouts.base')

@section('title','Produtos')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Detalhes do Produto</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('produtos.index') }}">Voltar</a></li>
            <li> <a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <table border="1">
            <tr>
                <td>ID:</td>
                <td>{{ $produto->id }}</td>
            </tr>

            <tr>
                <td>Nome</td>
                <td>{{ $produto->nome }}</td>
            </tr>

            <tr>
                <td>Descrição:</td>
                <td>{{ $produto->descricao }}</td>
            </tr>

            <tr>
                <td>Peso:</td>
                <td>{{ $produto->peso }}</td>
            </tr>

            <tr>
                <td>Unidade de Medida:</td>
                <td>{{ $produto->unidade_id }}</td>
            </tr>

        </table>
    </div>
</div>
@endsection
