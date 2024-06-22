@if (isset($produto_detalhe->id))
<form method="post" action="{{ route('produtos-detalhes.update',['produto_detalhe'=>$produto_detalhe->id]) }}">
    {{--  <input type="hidden" name="id" value="{{ $produto_detalhe->id ?? '' }}"> --}}
    @csrf
    @method('PUT')
@else
<form method="post" action="{{ route('produtos-detalhes.store') }}">
   {{--  <input type="hidden" name="id" value="{{ $produto_detalhe->id ?? '' }}"> --}}
    @csrf
@endif
    <input type="text" name="product_id" value="{{ $produto_detalhe->product_id ?? old('product_id') }}" placeholder="Produto ID" class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
    <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
    {{ $errors->has('largura') ? $errors->first('largura') : ''}}
    <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
    {{ $errors->has('altura') ? $errors->first('altura') : ''}}
    <input type="text" name="peso" value="{{ $produto_detalhe->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : ''}}
    <select name="unidade_id" value="{{ $produto_detalhe->unidade_id ?? old('unidade_id') }}" placeholder="unidade_id" class="borda-preta">
    <option>--Selecione a Unidade de medida--</option>
    @foreach ($unidades as $unidade )
    <option value="{{ $unidade->id }}" {{( $produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' :'' }}>{{ $unidade->unidade }}</option>
    @endforeach
   </select>
   {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
