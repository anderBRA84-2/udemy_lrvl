
{{ $slot }}{{-- com a variavel $slot recebemos o parametro definido dentro da diretiva component na view contato--}}
<form action={{ route('site.contato') }} method="post">
    @csrf {{-- token para utilizar o metodo post --}}
    {{-- metodo old recupera o request caso ocorra algum erro de validacao  --}}
    <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome" class={{ $class }}>
    @if ($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class={{ $class }}>
    <br>
    <input  name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class={{ $class }}>
    <br>

    <select name="motivo_contato_id" value="{{ old('motivo_contato_id') }}" class={{ $class }}>
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contato as $key => $motivo_contatos ) {{-- o array com as opcoes estao definidos no contato controller --}}
            <option value="{{ $motivo_contatos->id }}" {{ old('motivo_contato_id') ==  $motivo_contatos->id ? 'selected' : '' }}>{{ $motivo_contatos->motivo_contato }}</option>
        @endforeach

    </select>
    <br>
    <textarea name="mensagem" class={{ $class }}>{{ (old('mensagem') != '' ) ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class={{ $class }}>ENVIAR</button>
</form>

@if ($errors->any())
    <div style="position: absolute; top:0px; left:0px; width:100%; background:greenyellow" >
        @foreach ( $errors->all() as $erro )
                {{ $erro }}
        @endforeach
    </div>

@endif
