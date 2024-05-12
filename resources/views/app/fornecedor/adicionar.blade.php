@extends('app.layouts.base')

@section('title','Fornecedores')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> <h1>Fornecedor - adicionar</h1> </p>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
            <li> <a href="{{ route('app.fornecedores') }}">Consulta</a></li>

        </ul>
    </div>

    <div class="informacao-pagina">
        <h1 style="color:red;">{{ $msg ?? ''}}</h1>
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form method="post" action="{{ route('app.fornecedores.adicionar') }}">
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                @csrf                
                <input type="text" name="name" value="{{ $fornecedor->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                {{ $errors->has('name') ? $errors->first('name') : '' }}
                <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                {{ $errors->has('site') ? $errors->first('site') : '' }}
                <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
                {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="email" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}
                <button type="submit" class="borda-preta">Cadestrar</button>
            </form>

        </div>
    </div>
</div>
@endsection
