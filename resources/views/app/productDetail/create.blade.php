@extends('app.layouts.base')

@section('title','Detalhes do Produto')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Detalhes do Produto</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="#">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        <div style="width:30%; margin-left: auto; margin-right: auto;">
            @component('app.productDetail._components.form_create_edit', ['unidades'=> $unidades])

            @endcomponent

        </div>
    </div>
</div>
@endsection
