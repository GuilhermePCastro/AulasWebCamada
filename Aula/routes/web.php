<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\VendasController;

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
})-> name('welcome');

Route::get('/avisos', function () {
    $nome = 'Guilherme';
    return view('avisos')->with('array',[   'nome' => 'Guilherme',
                                            'mostra' => true,
                                            'avisos' => [[   'id' => '1',
                                                            'texto' => 'Vamos adiantar essa poha'],
                                                        [   'id' => '2',
                                                            'texto' => 'Vamos adiantar não']]]);
})-> name('avisos');

Route::get('/tabela', function () {
    $nome = 'Guilherme';
    return view('tabelas')->with('array',[   'nome' => 'Guilherme',
                                            'mostraMenu' => true,
                                            'campos' => [[  'time' => 'São Paulo',
                                                            'titulos' => '100',
                                                            'tamanho' => 'Soberano'],
                                                        [ 'time' => 'Curintia',
                                                            'titulos' => '3',
                                                            'tamanho' => 'Pequeno'],
                                                        [ 'time' => 'Santos',
                                                            'titulos' => '20',
                                                            'tamanho' => 'Grande'],
                                                        [ 'time' => 'Parmeiras',
                                                            'titulos' => '3 1/2',
                                                            'tamanho' => 'Modesto']]]);
})-> name('tabela');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function(){
    Route::get('/listar', [ClientesController::class, 'listar'])->name('clientes.listar')->middleware('auth');
});

Route::group(['prefix' => 'vendas'], function(){
    Route::get('/listar', [VendasController::class, 'listar'])->name('vendas.listar')->middleware('auth');
});

Route::group(['prefix' => 'funcionarios'], function(){
    Route::get('/listar', [FuncionariosController::class, 'listar'])->name('funcionarios.listar')->middleware('auth');
});

//Route::get('/clientes', [ClientesController::class, 'listar'])->name('clientes.listar');

Route::group(['middleware' => ['auth']], function(){

    Route::resource('/users',UserController::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/clientes',ClientesController::class);
    Route::resource('/produtos',ProdutosController::class);
    //Route::resource('/funcionarios',FuncionariosController::class);
});

