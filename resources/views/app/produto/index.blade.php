@extends('app.layouts.base')

@section('title','Produtos')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Produtos - Listar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('produtos.create') }}">Cadastrar produto</a></li>
            <li> <a href="">Consulta</a></li>

        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">

                <thead>
                    <tr>
                        <th style="background-color: #88DAF3; " >Nome</th>
                        <th style="background-color: #88DAF3; ">Descrição</th>
                        <th style="background-color: #88DAF3; ">Fornecedor</th>
                        <th style="background-color: #88DAF3; ">Site</th>
                        <th style="background-color: #88DAF3; ">Peso</th>
                        <th style="background-color: #88DAF3; ">Unidade ID</th>
                        <th style="background-color: #88DAF3; ">Comprimento</th>
                        <th style="background-color: #88DAF3; ">Altura</th>
                        <th style="background-color: #88DAF3; ">Largura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td >{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedores->name }}</td>
                            <td> <a href="#">{{ $produto->fornecedores->site }}</a></td>
                            <td>{{ $produto->peso}}</td>
                            <td>{{ $produto->unidade_id}}</td>
                            <td>{{ $produto->productDetail->comprimento ?? ''}}</td>
                            <td>{{ $produto->productDetail->altura ?? ''}}</td>
                            <td>{{ $produto->productDetail->largura ?? ''}}</td>
                            <td><a href="{{route('produtos.show',['produto' => $produto->id])}}">Detalhes</a></td>
                            <form  id="form_{{$produto->id}}" method="post" action="{{ route('produtos.destroy',['produto'=>$produto->id])}}">
                                @csrf
                                @method('DELETE')
                                <td><a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a></td>
                            </form>
                            <td><a href="{{ route('produtos.edit',['produto' => $produto->id]) }}">Editar</a></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                Exibir ID do Pedido(s)
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $produtos->appends($request)->links() }}
            <br>


        </div>
    </div>
</div>
@endsection
