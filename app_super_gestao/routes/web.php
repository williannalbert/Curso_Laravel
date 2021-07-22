<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'ContatoController@contato')->name('site.contato');
Route::get('/contato', 'SobreNosController@sobreNos')->name('site.sobre-nos');
Route::get('/login', function(){return 'Login';})->name('site.login');
/*Route::get('/contato/{nome}/{categoria_id}', 
    function(string $nome = "Desconhecido", 
        int $categoria = 1){
        echo "$nome - $categoria";
    }
)->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');*/
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');    
});

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir até a página inicial';
});
