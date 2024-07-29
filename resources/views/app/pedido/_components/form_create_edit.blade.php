@if (isset($pedido->id))
    <form method="post" action="{{ route('pedido.update',['pedido'=>$pedido->id]) }}">
        {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{ route('pedido.store') }}">
                {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
                @csrf
                @endif

                <select name="cliente_id" value="{{ $cliente->id ?? old('cliente_id') }}" placeholder="cliente_id" class="borda-preta">
                    <option>--Selecione o cliente--</option>
                    @foreach ($clientes as $cliente )
                        <option value="{{ $cliente->id }}" {{( $pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' :'' }}>{{ $cliente->id." - ".$cliente->name }}</option>
                    @endforeach
                </select>
                {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}


                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
