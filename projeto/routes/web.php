<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardClienteController;
use App\Http\Controllers\CarrinhoController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware([RoleAdmMiddleware::class])->group(function () {
        Route::resource('categorias', CategoriaController::class);
        Route::resource('produtos', ProdutoController::class);
        Route::get('/dashboard', function(){ 
            return view('dashboard'); 
        });
    });

    Route::middleware([RoleCliMiddleware::class])->group(function () {
        Route::get('/dashboard-cli', [DashboardClienteController::class, 'index']);
        Route::post('/carrinho/add', [CarrinhoController::class, 'add']);
        Route::post('/carrinho/remove', [CarrinhoController::class, 'remove']);
        Route::post('/carrinho/fechar', [CarrinhoController::class, 'fechar']);
    });
    
});

