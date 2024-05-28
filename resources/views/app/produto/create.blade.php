@extends('app.layouts.base')

@section('title','Produtos')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Produto - adicionar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.produtos') }}">Voltar</a></li>
            <li> <a href="{{ route('app.fornecedores') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        <div style="width:30%; margin-left: auto; margin-right: auto;">

            <form method="post" action="{{ route('app.produtos.store') }}">
               {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
                @csrf
                <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descricao" class="borda-preta">
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                {{ $errors->has('peso') ? $errors->first('peso') : ''}}
                <select name="unidade_id" value="{{ $produto->unidade_id ?? old('unidade_id') }}" placeholder="unidade_id" class="borda-preta">
                <option>--Selecione a Unidade de medida--</option>
                @foreach ($unidades as $unidade )
                <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                @endforeach
               </select>
               {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>

        </div>
    </div>
</div>
@endsection
