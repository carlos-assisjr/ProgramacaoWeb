<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ExercicioController;
Route::get('/', function () {
    return view('welcome');
});

//rota para abrir o exercicio 1
Route:: get ('/exercicio',[ExercicioController::class, 'exibirFormulario']);
//receber os dados do formulario 1
Route:: post ('/resposta',[ExercicioController::class, 'calcularSoma']);
//rota para abrir o exercicio 2
Route:: get ('/exercicio2',[ExercicioController::class, 'exibirFormulario2']);
//receber os dados do formulario 2
Route:: post ('/resposta2',[ExercicioController::class, 'calcularSub']);
//rota para abrir o exercicio 3
Route:: get ('/exercicio3',[ExercicioController::class, 'exibirFormulario3']);
//receber os dados do formulario 3
Route:: post ('/resposta3',[ExercicioController::class, 'calcularMult']);
//rota para abrir o exercicio 4
Route:: get ('/exercicio4',[ExercicioController::class, 'exibirFormulario4']);
//receber os dados do formulario 4
Route:: post ('/resposta4',[ExercicioController::class, 'calcularDiv']);
//rota para abrir o exercicio 5
Route:: get ('/exercicio5',[ExercicioController::class, 'exibirFormulario5']);
//receber os dados do formulario 5
Route:: post ('/resposta5',[ExercicioController::class, 'calcularMedia']);
//rota para abrir o exercicio 6
Route:: get ('/exercicio6',[ExercicioController::class, 'exibirFormulario6']);
//receber os dados do formulario 6
Route:: post ('/resposta6',[ExercicioController::class, 'calcularTemperatura']);
//rota para abrir o exercicio 7
Route:: get ('/exercicio7',[ExercicioController::class, 'exibirFormulario7']);
//receber os dados do formulario 7
Route:: post ('/resposta7',[ExercicioController::class, 'calcularTemperaturaCelsius']);
//rota para abrir o exercicio 8
Route:: get ('/exercicio8',[ExercicioController::class, 'exibirFormulario8']);
//receber os dados do formulario 8
Route:: post ('/resposta8',[ExercicioController::class, 'calcularArea']);
//rota para abrir o exercicio 9
Route:: get ('/exercicio9',[ExercicioController::class, 'exibirFormulario9']);
//receber os dados do formulario 9
Route:: post ('/resposta9',[ExercicioController::class, 'calcularAreaCirculo']);
//rota para abrir o exercicio 10
Route:: get ('/exercicio10',[ExercicioController::class, 'exibirFormulario10']);
//receber os dados do formulario 10
Route:: post ('/resposta10',[ExercicioController::class, 'calcularPerimetro']);
//rota para abrir o exercicio 11
Route:: get ('/exercicio11',[ExercicioController::class, 'exibirFormulario11']);
//receber os dados do formulario 11
Route:: post ('/resposta11',[ExercicioController::class, 'calcularPerimetroCirculo']);
//rota para abrir o exercicio 12
Route:: get ('/exercicio12',[ExercicioController::class, 'exibirFormulario12']);
//receber os dados do formulario 12
Route:: post ('/resposta12',[ExercicioController::class, 'calcularPotencia']);
//rota para abrir o exercicio 13
Route:: get ('/exercicio13',[ExercicioController::class, 'exibirFormulario13']);
//receber os dados do formulario 13
Route:: post ('/resposta13',[ExercicioController::class, 'calcularCentimetro']);