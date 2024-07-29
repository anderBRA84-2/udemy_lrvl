@extends('app.layouts.base')

@section('title','Pedido-produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p> <h1>Pedido- adiciona produtor</h1> </p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li> <a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>Id do pedido: {{ $pedido->id}}</p>
            <p>Cliente: {{ $pedido->cliente_id}}</p>

            <div style="width:30%; margin-left: auto; margin-right: auto;">


                @component('app.pedido-produto._components.form_create_edit',['pedido' => $pedido, 'produtos' => $produtos])

                @endcomponent

            </div>
        </div>
    </div>
@endsection
