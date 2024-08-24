<div class="topo">

    <div class="logo">
       <a href="{{ route('site.index') }}"> <img src={{ asset('img/terno.jpg') }} width="50px"> </a>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
            <li><a href="{{ route('pedido.index') }}">Pedidos</a></li>
            <li><a href="{{ route('app.fornecedores') }}">Fornecedores</a></li>
            <li><a href="{{ route('produtos.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>

</div>

