@extends('app.layouts.base')

@section('title','Pedidos')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p> <h1>Produtos - Listar</h1> </p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('pedido.create') }}">Cadastrar pedido</a></li>
                <li> <a href="">Consulta</a></li>

            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">

                    <thead>
                    <tr>
                        <th style="background-color: #88DAF3; " >ID do Pedido</th>
                        <th style="background-color: #88DAF3; " >Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td >{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>

                            <td><a href="{{route('pedido.show',['pedido' => $pedido->id])}}">Detalhes</a></td>
                            <form  id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy',['pedido'=>$pedido->id])}}">
                                @csrf
                                @method('DELETE')
                                <td><a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a></td>
                            </form>
                            <td><a href="{{ route('pedido.edit',['pedido' => $pedido->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                {{ $pedidos->appends($request)->links() }}
                <br>


            </div>
        </div>
    </div>
@endsection
