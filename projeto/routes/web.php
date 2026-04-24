<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;

Route ::get('/',[HomeController::Class,'index']);
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
        Route::get('/dashboard-cli', function() {
            return view('dashboard-cli');
        });
    });
    
    
    
});

