<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobreNosController,
    ContatoController,
    TesteController,
    FornecedoresController,
    LoginController,
    HomeController,
    ClienteController,
    ProdutoController,
    ProductDetailController,
    PedidoController,
    PedidoProdutoController

};

        Route::get('/', [PrincipalController::class,'principal'])->name('site.index');
        Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
        Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
        Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');
        Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
        Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

    Route::middleware("autenticacao:padrao,usuario")->prefix('app')->group(function() {//passar parametros para o middleware com : e uma string que sera o parametro no metodo handle do middleware
        Route::get('/home', [HomeController::class,'index'])->name('app.home');
        Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
        Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
        Route::post('/fornecedores/listar', [FornecedoresController::class, 'listar'])->name('app.fornecedores.listar');
        Route::get('/fornecedores/listar', [FornecedoresController::class, 'listar'])->name('app.fornecedores.listar');//feita para a paginacao
        Route::post('/fornecedores/adicionar', [FornecedoresController::class, 'adicionar'])->name('app.fornecedores.adicionar');
        Route::get('/fornecedores/adicionar', [FornecedoresController::class, 'adicionar'])->name('app.fornecedores.adicionar');
        Route::get('/fornecedores/excluir/{id}/{msg?}', [FornecedoresController::class, 'excluir'])->name('app.fornecedores.excluir');
        Route::get('/fornecedores/editar/{id}/{msg?}', [FornecedoresController::class, 'editar'])->name('app.fornecedores.editar');
       /**
        * Caso não seja usado o route resource podemos criar manuamente os recursos
        Route::get('/produtos', [ProdutoController::class,'index'])->name('app.produtos');
        Route::get('/produtos/create', [ProdutoController::class,'create'])->name('app.produtos.create');
        Route::get('/produtos/show/{produto}',[ProdutoController::class,'show'])->name('app.produtos.show');
        Route::get('/produtos/edit/{produto}',[ProdutoController::class,'edit'])->name('app.produtos.edit');
        Route::post('/produtos/edit/{produto}',[ProdutoController::class,'edit'])->name('app.produtos.edit');
        Route::put('/produtos/update/{produto}',[ProdutoController::class,'update'])->name('app.produtos.update');
        Route::delete('/produtos/destroy/{produto}',[ProdutoController::class,'destroy'])->name('app.produtos.delete'); */
        Route::resource('/produtos', ProdutoController::class);
        Route::resource('/produtos-detalhes', ProductDetailController::class);
        Route::resource('/clientes',ClienteController::class);
        Route::resource('/pedido', PedidoController::class);
       //Route::resource('/pedido-produto', PedidoProdutoController::class);
        Route::get('/pedido-produto/create/{pedido}',[PedidoProdutoController::class,'create'])->name('pedido-produto.create');
        Route::post('/pedido-produto/store/{pedido}',[PedidoProdutoController::class,'store'])->name('pedido-produto.store');
        //Route::delete('/pedido-produto/destroy/{pedido}/{produto}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');
        Route::delete('/pedido-produto/destroy/{pedidoProduto}/{pedido_id}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');//removendo o relcionamento pela PK
        });



//passando parametros para o controlador
Route::get('teste/{p1}/{p2}',[TesteController::class,'teste']);

//rota de contingencia (fallback)
Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para retornar a pagina inicial';
});

//redirecionamento
/* Route::get('/rota1',function(){
    echo "Rota 1";
})->name('site.rota1');

Route::get('/rota2',function(){
    return redirect()->route('site.rota1');
})->name('site.rota2'); */



//Route::redirect('/rota1', '/rota2');//redireciona a rota1 para a rota2
//interrogacao ao final do parametro torna ele opcional
/*Route::get(
    'contato/{nome}/{categoria_id}',
    function(
        string $nome = 'Desconhecido',
        int $categoria_id = 1
        ){
        echo "Estamos aqui: $nome - $categoria_id ";
    }
) ->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');*/
//expressao regular que garante que que sera preenchido um nome e um numero
