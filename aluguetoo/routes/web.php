<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\AluguelController;
use App\Http\Controllers\ItemAluguelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardClienteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\RelatorioController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;

/*
|--------------------------------------------------------------------------
| ROTAS PÚBLICAS
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| ROTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware([RoleAdmMiddleware::class])->group(function () {

        Route::get('/dashboard-adm', [DashboardAdminController::class, 'equipamentosAlugados'])
            ->name('dashboard.adm');

        Route::get('/relatorio/equipamentos', [RelatorioController::class, 'gerarRelatorio'])
            ->name('relatorio.equipamentos');
        Route::resource('categorias', CategoriaController::class);
        Route::resource('equipamentos', EquipamentoController::class);
        Route::resource('lojas', LojaController::class);
        Route::resource('alugueis', AluguelController::class);
        Route::resource('itens_aluguel', ItemAluguelController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | CLIENTE
    |--------------------------------------------------------------------------
    */
    Route::middleware([RoleCliMiddleware::class])->group(function () {

        Route::get('/dashboard-cli', [DashboardClienteController::class, 'index'])
            ->name('dashboard.cli');

        Route::post('/carrinho/add', [CarrinhoController::class, 'add'])
            ->name('carrinho.add');

        Route::post('/carrinho/remove', [CarrinhoController::class, 'remove'])
            ->name('carrinho.remove');

        Route::post('/carrinho/fechar', [CarrinhoController::class, 'fechar'])
            ->name('carrinho.fechar');
    });
});