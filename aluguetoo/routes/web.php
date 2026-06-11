<?php

use App\Http\Controllers\AluguelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardClienteController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\MeusAlugueisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard.adm', [DashboardAdminController::class, 'index']);
    Route::get('/dashboard.cli', [DashboardClienteController::class, 'index']);

    Route::resource('/categoria', CategoriaController::class);
    Route::resource('/loja', LojaController::class);
    Route::resource('/equipamento', EquipamentoController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/aluguel', AluguelController::class);

    Route::get('/carrinho', [CarrinhoController::class, 'index']);
    Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar']);
    Route::post('/carrinho/atualizar-datas', [CarrinhoController::class, 'atualizarDatas']);
    Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finalizar']);
    Route::delete('/carrinho/remover/{item}', [CarrinhoController::class, 'remover']);
    
    Route::get('/meus-alugueis', [MeusAlugueisController::class, 'index']);
    Route::post('/meus-alugueis/item/{id}/devolver', [MeusAlugueisController::class, 'devolverAntecipado']);
});
