<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    public function exibirFormulario()
    {
        return view('exercicio');
    }
    public function calcularSoma(Request $request)
    {
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');
        $soma = $valor1 + $valor2;
        return view('exercicio', ['soma' => $soma]);
    }
    public function exibirFormulario2()
    {
        return view('exercicio2');
    }
    public function calcularSub(Request $request)
    {
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');
        $sub = $valor1 - $valor2;
        return view('exercicio2', ['sub' => $sub]);
    }
    public function exibirFormulario3()
    {
        return view('exercicio3');
    }
    public function calcularMult(Request $request)
    {
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');
        $mult = $valor1 * $valor2;
        return view('exercicio3', ['mult' => $mult]);
    }
    public function exibirFormulario4()
    {
        return view('exercicio4');
    }
    public function calcularDiv(Request $request)
    {
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');
        if ($valor2 != 0) {
            $div = $valor1 / $valor2;
        } else {
            $div = 'Erro: Divisão por zero não é permitida.';
        }
        return view('exercicio4', ['div' => $div]);
    }
    public function exibirFormulario5()
    {
        return view('exercicio5');
    }
    public function calcularMedia(Request $request)
    {
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');
        $valor3 = $request->input('valor3');
        $media = ($valor1 + $valor2 + $valor3) / 3;

        return view('exercicio5', ['media' => $media]);
    }
    public function exibirFormulario6()
    {
        return view('exercicio6');
    }
    public function calcularTemperatura(Request $request)
    {
        $valor1 = $request->input('valor1');
        $fahrenheit = ($valor1 * 9 / 5) + 32;
        return view('exercicio6', ['temperatura' => $fahrenheit]);
    }
    public function exibirFormulario7()
    {
        return view('exercicio7');
    }
    public function calcularTemperaturaCelsius(Request $request)
    {
        $valor1 = $request->input('valor1');
        $celsius = ($valor1 - 32) * 5 / 9;
        return view('exercicio7', ['temperatura' => $celsius]);
    }
    public function exibirFormulario8()
    {
        return view('exercicio8');
    }
    public function calcularArea(Request $request)
    {
        $largura = $request->input('largura');
        $altura = $request->input('altura');
        $area = $largura * $altura;
        return view('exercicio8', ['area' => $area]);
    }
    public function exibirFormulario9()
    {
        return view('exercicio9');
    }
    public function calcularAreaCirculo(Request $request)
    {
        $raio = $request->input('raio');
        $area = pi() * pow($raio, 2);
        return view('exercicio9', ['area' => $area]);
    }
    public function exibirFormulario10()
    {
        return view('exercicio10');
    }
    public function calcularPerimetro(Request $request)
    {
        $largura = $request->input('largura');
        $altura = $request->input('altura');
        $perimetro = ($largura * 2) + ($altura * 2);
        return view('exercicio10', ['perimetro' => $perimetro]);
    }
    public function exibirFormulario11()
    {
        return view('exercicio11');
    }
    public function calcularPerimetroCirculo(Request $request)
    {
        $raio = $request->input('raio');
        $perimetro = 2 * pi() * $raio;
        return view('exercicio11', ['perimetro' => $perimetro]);
    }
    public function exibirFormulario12()
    {
        return view('exercicio12');
    }
    public function calcularPotencia(Request $request)
    {
        $base = $request->input('base');
        $expoente = $request->input('expoente');
        $potencia = $base ** $expoente;
        return view('exercicio12', ['potencia' => $potencia]);
    }
    public function exibirFormulario13()
    {
        return view('exercicio13');
    }
    public function calcularCentimetro(Request $request)
    {
        $metro = $request->input('metro');
        $centimetro = $metro * 100;
        return view('exercicio13', ['centimetro' => $centimetro]);
    }
}
