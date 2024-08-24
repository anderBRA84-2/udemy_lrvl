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
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME DO PRODUTO</th>
                            <th>DATA DE INCLUSAO</th>
                            <th>QUANTIDADE</th>
                            <th>Remover Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto ) {{-- $pedido->produtos devido ao relcionamento no modelo PedidoProduto --}}
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/y') }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>
                                <form id="form_{{ $pedido->id }}_{{ $produto->id }}" action="{{ route('pedido-produto.destroy',['pedido'=>$pedido->id,'produto'=>$produto->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}_{{ $produto->id }}').submit()">Remover</a>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @component('app.pedido-produto._components.form_create_edit',['pedido' => $pedido, 'produtos' => $produtos])

                @endcomponent

            </div>
        </div>
    </div>
@endsection
