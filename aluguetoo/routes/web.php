<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\AluguelController;
use App\Http\Controllers\ItemAluguelController;
use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('equipamentos', EquipamentoController::class);
Route::resource('lojas', LojaController::class);
Route::resource('alugueis', AluguelController::class);
Route::resource('itens_aluguel', ItemAluguelController::class);