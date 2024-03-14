@extends('site.layouts.base') {{-- aponta  para o template a ser usado --}}

@section('title',$title) {{-- aqui nao usamos end section pois estamos usando para passar um paramentro para yeild() no caso o titulo da pagina que é refereciado no controlador  --}}

@section('content') {{-- seleciona o bloco de codigo a ser enviado como parametro --}}
<div class="conteudo-destaque">

<div class="esquerda">
    <div class="informacoes">
        <h1>Sistema Super Gestão</h1>
        <p>Software para gestão empresarial ideal para sua empresa.<p>
        <div class="chamada">
            <img src={{ asset('/img/check.png') }}>
            <span class="texto-branco">Gestão completa e descomplicada</span>
        </div>
        <div class="chamada">
            <img src={{ asset('/img/check.png') }}>
            <span class="texto-branco">Sua empresa na nuvem</span>
        </div>
    </div>

    <div class="video">
        <img src={{ asset('img/player_video.jpg') }}>
    </div>
</div>

<div class="direita">
    <div class="contato">
        <h1>Contato</h1>
        <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
            @component('site.layouts.components.formContato', ['class'=>'borda-branca', 'motivo_contato' => $motivo_contato])

            @endcomponent
    </div>
</div>
</div>
@endsection
