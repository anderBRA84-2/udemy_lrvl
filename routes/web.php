<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobreNosController,
    ContatoController,
    TesteController,
    FornecedoresController,
};

Route::get('/', [PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato2');
Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){return 'login';})->name('site.login');


Route::prefix('app')->group(function() {
    Route::get('/clientes', function(){return 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');

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
