<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnidadeProdutoController;



Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('users', UserController::class);
Route::resource('unidade_produtos', UnidadeProdutoController::class);