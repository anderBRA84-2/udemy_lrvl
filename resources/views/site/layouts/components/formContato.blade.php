
{{ $slot }}{{-- com a variavel $slot recebemos o parametro definido dentro da diretiva component na view contato--}}
<form action={{ route('site.contato') }} method="post">
    @csrf {{-- token para utilizar o metodo post --}}
    <input name="nome" type="text" placeholder="Nome" class={{ $class }}>
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class={{ $class }}>
    <br>
    <input  name="email" type="text" placeholder="E-mail" class={{ $class }}>
    <br>
    <select name="motivo_contato" class={{ $class }}>
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class={{ $class }}>Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class={{ $class }}>ENVIAR</button>
</form>
