<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;


Route::resource('produtos', ProdutoController::class);
Route::resource('categorias', CategoriaController::class);