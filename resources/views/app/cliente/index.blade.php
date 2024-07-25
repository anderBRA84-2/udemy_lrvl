@extends('app.layouts.base')

@section('title','Clientes')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Clientes - Listar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('clientes.create') }}">Cadastrar produto</a></li>
            <li> <a href="">Consulta</a></li>

        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">

                <thead>
                    <tr>
                        <th style="background-color: #88DAF3; " >Nome</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td >{{ $cliente->nome }}</td>

                            <td><a href={{route('clientes.show',['cliente' => $cliente->id])}}>Detalhes</a></td>
                            <form  id="form_{{$cliente->id}}" method="post" action="{{ route('clientes.destroy',['cliente'=>$cliente->id])}}">
                                @csrf
                                @method('DELETE')
                                <td><a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a></td>
                            </form>
                            <td><a href={{ route('clientes.edit',['cliente' => $cliente->id]) }}>Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $clientes->appends($request)->links() }}
            <br>


        </div>
    </div>
</div>
@endsection
