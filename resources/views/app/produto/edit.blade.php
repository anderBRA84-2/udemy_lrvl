@extends('app.layouts.base')

@section('title','Produtos')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Produto - Editar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.produtos') }}">Voltar</a></li>
            <li> <a href="{{ route('app.fornecedores') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        <div style="width:30%; margin-left: auto; margin-right: auto;">

            <form method="post" action="{{ route('app.produtos.update',['produto'=>$produto->id]) }}">
               {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
                @csrf
                @method('PUT') {{--  com essa instrução indicamos com qual verbo queremos trabalahr no envio do form--}}
                <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descricao" class="borda-preta">
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                {{ $errors->has('peso') ? $errors->first('peso') : ''}}
                <select name="unidade_id" >
                <option>--Selecione a Unidade de medida--</option>
                @foreach ($unidades as $unidade )
                <option value="{{ $unidade->id }}" {{( $produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' :'' }}>{{ $unidade->unidade }}</option>
                @endforeach
               </select>
               {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>

        </div>
    </div>
</div>
@endsection
