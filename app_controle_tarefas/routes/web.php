<?php

use App\Mail\MensagemTestMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware('verified');
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')->middleware('auth')->middleware('verified');

Route::get('mensagem-teste', function(){
    //Mail::to('williannalbert123@gmail.com')->send(new MensagemTestMail);
    //return "Email enviado com sucesso!";
    return new MensagemTestMail;
});