            <form method="post" action="{{ route('pedido-produto.store',['pedido' => $pedido]) }}">
                {{--  <input type="hidden" name="id" value="{{ $produto->id ?? '' }}"> --}}
                    @csrf
                <select name="produto_id" value="{{ $produto->id ?? old('produto_id') }}" placeholder="produto_id" class="borda-preta">
                    <option>--Selecione um produto--</option>
                    @foreach ($produtos as $produto )
                        <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' :'' }}>{{ $produto->id." - ".$produto->nome }}</option>
                    @endforeach
                </select>
                {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''}}


                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
