@if (isset($cliente->id))
<form method="post" action="{{ route('clientes.update',['cliente'=>$cliente->id]) }}">
    {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('clientes.store') }}">
   {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
    @csrf
@endif
    <input type="text" name="name" value="{{ $cliente->name ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('name') ? $errors->first('name') : '' }}


    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
