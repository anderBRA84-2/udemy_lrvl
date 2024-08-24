            <form method="post" action="{{ route('pedido-produto.store',['pedido' => $pedido]) }}">
                {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
                    @csrf
                <select name="product_id" value="{{ $produto->id ?? old('product_id') }}" placeholder="product_id" class="borda-preta">
                    <option>--Selecione um produto--</option>
                    @foreach ($produtos as $produto )
                        <option value="{{ $produto->id }}" {{ old('product_id') == $produto->id ? 'selected' :'' }}>{{ $produto->id." - ".$produto->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->has('product_id') ? $errors->first('product_id') : ''}}

                <input type="number" name="quantidade" value="{{ old('quantidade') ? old('quantidade') : '' }}" placeholder="Quantidade" class="borda-preta">
                {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}



                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
