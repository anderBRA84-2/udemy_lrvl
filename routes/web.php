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
    ProdutosController
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
        Route::get('/clientes', [ClienteController::class, 'index'])->name('app.clientes');
        Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
        Route::get('/produtos', [ProdutosController::class, 'index'])->name('app.produtos');
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
