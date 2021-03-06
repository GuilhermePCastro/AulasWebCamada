<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth.jwt', 'prefix' => 'v1'], function(){

    Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/{id}', [FuncionariosController::class, 'show'])->name('funcionarios.show');
    Route::put('/funcionarios/{id}', [FuncionariosController::class, 'update'])->name('funcionarios.update');
    Route::post('/funcionarios', [FuncionariosController::class, 'store'])->name('funcionarios.store');
    Route::delete('/funcionarios/{id}', [FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');
});

//Exercicio 21/05
Route::group(['middleware' => 'auth.jwt', 'prefix' => 'v1'], function(){

    Route::get('/vendas', [VendasController::class, 'index'])->name('vendas.index');
    Route::get('/vendas/{id}', [VendasController::class, 'show'])->name('vendas.show');
    Route::put('/vendas/{id}', [VendasController::class, 'update'])->name('vendas.update');
    Route::post('/vendas', [VendasController::class, 'store'])->name('vendas.store');
    Route::delete('/vendas/{id}', [VendasController::class, 'destroy'])->name('vendas.destroy');
});

Route::post('login', [APIController::class, 'login'])->name('api.login');
Route::post('logout', [APIController::class, 'logout'])->name('api.logout');
