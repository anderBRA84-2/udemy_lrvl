@extends('app.layouts.base')

@section('title','Pedidos')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p> <h1>Pedido- adicionar</h1> </p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li> <a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width:30%; margin-left: auto; margin-right: auto;">
                @component('app.pedido._components.form_create_edit',['clientes' => $clientes])

                @endcomponent

            </div>
        </div>
    </div>
@endsection
