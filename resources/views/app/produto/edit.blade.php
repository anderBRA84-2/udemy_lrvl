@extends('app.layouts.base')

@section('title','Produtos')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Produto - editar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('produtos.index') }}">Voltar</a></li>
            <li> <a href="{{ route('produtos.index') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        <div style="width:30%; margin-left: auto; margin-right: auto;">
            @component('app.produto._components.form_create_edit',['produto'=>$produto, 'unidades'=>$unidades, 'fornecedores'=>$fornecedores])

            @endcomponent

        </div>
    </div>
</div>
@endsection
