<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ExercicioController extends Controller
{
    public function exibirFormulario(){
        return view('exercicio');
    }
    public function calcularSoma(Request $request){
        $valor1 = $request -> input('valor1');
        $valor2 = $request -> input('valor2');
        $soma = $valor1 + $valor2;
        return view('exercicio',['soma'=> $soma]);
    }
    public function exibirFormulario2(){
        return view('exercicio2');
    }
    public function calcularSub(Request $request){
        $valor1 = $request -> input('valor1');
        $valor2 = $request -> input('valor2');
        $sub = $valor1 - $valor2;
        return view('exercicio2',['sub'=> $sub]);
    }

}