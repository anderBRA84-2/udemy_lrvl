@extends('site.layouts.base') {{-- aponta  para o template a ser usado --}}

@section('title',$title) {{-- aqui nao usamos end section pois estamos usando para passar um paramentro para yeild() no caso o titulo da pagina  --}}

@section('content') {{-- seleciona o bloco de codigo a ser enviado como parametro --}}
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>

    <div class="informacao-pagina">
        <div class="contato-principal">
            @component('site.layouts.components.formContato', ['class'=>'borda-preta', 'motivo_contato' => $motivo_contato]){{-- o parametro pode ser incluido dentro da diretiva ou na chamada da diretiva  --}}
            <p> A nossa equipe ira entrar em contato o mais breve possivel</p>
            <p> O nosso tempo de resposta é de aproximadamente de 48h </p>
            @endcomponent
        </div>
    </div>
</div>


@endsection
