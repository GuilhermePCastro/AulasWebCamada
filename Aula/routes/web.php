<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

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

//Route::get('/clientes', [ClientesController::class, 'listar'])->name('clientes.listar');

