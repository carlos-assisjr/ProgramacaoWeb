<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ExercicioController;
use App\Http\Controllers\AuthController;


//rota para abrir o exercicio 2
Route:: get ('/exerc1',[ExercicioController::class, 'exibirFormulario1']);//rota para abrir o exercicio 1
//receber os dados do formulario 1
Route:: post ('/resposta1',[ExercicioController::class, 'calcularSoma']);
//rota para abrir o exercicio 2
Route:: get ('/exerc2',[ExercicioController::class, 'exibirFormulario2']);
//receber os dados do formulario 2
Route:: post ('/resposta2',[ExercicioController::class, 'calcularSub']);

//rota para abrir o exercicio 3
Route:: get ('/exerc3', [ExercicioController::class, 'exibirFormulario3']);
//receber os dados do formulario 3
Route:: post('/resposta3',[ExercicioController::class, 'calcularMultiplicacao']);

//rota para abrir o exercicio 4
Route:: get ('/exerc4', [ExercicioController::class, 'exibirFormulario4']);
//receber os dados do formulario 4
Route:: post('/resposta4',[ExercicioController::class, 'calcularDivisao']);

//rota para abrir o exercicio 5
Route:: get ('/exerc5', [ExercicioController::class, 'exibirFormulario5']);
//receber os dados do formulario 5
Route:: post('/resposta5',[ExercicioController::class, 'calcularMedia']);

//rota para abrir o exercicio 6
Route::get ('/exerc6',[ExercicioController::class, 'exibirFormulario6']);
//receber os dados do formulario 6
Route::post ('/resposta6', [ExercicioController::class, 'converterCelcius']);

//rota para abrir o exercicio 7
Route::get ('/exerc7',[ExercicioController::class, 'exibirFormulario7']);
//receber os dados do formulario 7
Route::post ('/resposta7', [ExercicioController::class, 'converterFahrenheit']);

//rota para abrir o exercicio 8
Route::get ('/exerc8',[ExercicioController::class, 'exibirFormulario8']);
//receber os dados do formulario 8
Route::post ('/resposta8', [ExercicioController::class, 'calcularAreaR']);

//rota para abrir o exercicio 9
Route::get ('/exerc9', [ExercicioController::class, 'exibirFormulario9']);
//receber os dados do formulario 9
Route::post ('/resposta9', [ExercicioController::class, 'calcularAreaC']);

//rota para abrir o exercicio 10
Route::get ('/exerc10', [ExercicioController::class, 'exibirFormulario10']);
//receber os dados do formulario 10
Route::post ('/resposta10', [ExercicioController::class, 'calcularPerimetroR']);

//rota para abrir o exercicio 11
Route::get ('/exerc11', [ExercicioController::class, 'exibirFormulario11']);
//receber os dados do formulario 11
Route::post ('/resposta11', [ExercicioController::class, 'calcularPerimetroC']);

//rota para abrir o exercicio 12
Route::get ('/exerc12',[ExercicioController::class, 'exibirFormulario12']);
//receber os dados do formulario 12
Route::post ('/resposta12',[ExercicioController::class , 'calcularPotencia']);

//rota para abrir o exercicio 13
Route::get ('/exerc13',[ExercicioController::class, 'exibirFormulario13']);
//receber os dados do formulario 13
Route::post ('/resposta13',[ExercicioController::class , 'converterCentimetros']);

//rota para abrir o exercicio 14
Route::get ('/exerc14',[ExercicioController::class, 'exibirFormulario14']);
//receber os dados do formulario 14
Route::post ('/resposta14',[ExercicioController::class , 'converterParaMilhas']);

//rota para abrir o exercicio 15
Route::get ('/exerc15',[ExercicioController::class, 'exibirFormulario15']);
//receber os dados do formulario 15
Route::post ('/resposta15',[ExercicioController::class , 'calcularIMC']);

//rota para abrir o exercicio 16
Route::get ('/exerc16',[ExercicioController::class, 'exibirFormulario16']);
//receber os dados do formulario 16
Route::post ('/resposta16',[ExercicioController::class , 'calcularDesconto']);

//rota para abrir o exercicio 17
Route::get('/exerc17',[ExercicioController::class,'exibirFormulario17']);
//receber os dados do formulario 17
Route::post('/resposta17', [ExercicioController::class, 'calcularJurosSimples']);

//rota para abrir o exercicio 18
Route::get('/exerc18',[ExercicioController::class,'exibirFormulario18']);
//receber os dados do formulario 18
Route::post('/resposta18', [ExercicioController::class, 'calcularMontante']);

//rota para abrir o exercicio 19
Route::get('/exerc19',[ExercicioController::class,'exibirFormulario19']);
//receber os dados do formulario 19
Route::post('/resposta19', [ExercicioController::class,'conversaoDias']);

//rota para abrir o exercicio 20
Route::get('/exerc20',[ExercicioController::class,'exibirFormulario20']);
//receber os dados do formulario 20
Route::post('/resposta20', [ExercicioController::class,'calcularVelMedia']);

// ---------------------------rotas do projeto------------------------------------
Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);

Route::get('/login',[AuthController::class,'showFormLogin'])->name('login');
Route::post('/login',[AuthController::class,'login']);


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    });

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});