@extends('site.layouts.base') {{-- aponta  para o template a ser usado --}}

@section('title',$title) {{-- aqui nao usamos end section pois estamos usando para passar um paramentro para yeild() no caso o titulo da pagina  --}}

@section('content') {{-- seleciona o bloco de codigo a ser enviado como parametro --}}
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>LOGIN</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right:auto">
            <form action={{ route('site.login') }} method="POST">
                @csrf
                <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuario" class="borda-preta">
                {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                <input name="senha" value="{{ old('senha') }}" type="password" placeholder="senha" class="borda-preta">
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                <button type="submit" class="borda-preta">Acessar</button>        
            </form>
        </div>
    </div>
</div>

@include('site.layouts.partials.rodape')//footer
@endsection
