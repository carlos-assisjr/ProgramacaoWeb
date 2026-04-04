<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);