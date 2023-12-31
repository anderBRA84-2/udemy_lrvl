@extends('site.layouts.base') {{-- aponta  para o template a ser usado --}}

@section('title',$title) {{-- aqui nao usamos end section pois estamos usando para passar um paramentro para yeild() no caso o titulo da pagina  --}}

@section('content') {{-- seleciona o bloco de codigo a ser enviado como parametro --}}
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Olá, eu sou o Super Gestão</h1>
    </div>

    <div class="informacao-pagina">
        <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os negócios da sua empresa.</p>
        <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
    </div>
</div>

@include('site.layouts.partials.rodape')//footer
@endsection
