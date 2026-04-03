<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ExercicioController extends Controller
{

    public function exibirFormulario1(){
        return view('Exercicios.exerc1');
    }
    public function calcularSoma(Request $request){
        $valor1 = $request->input('valor1');
        $valor2 = $request->input('valor2');
        $soma = $valor1 + $valor2;
        return view('Exercicios.exerc1', ['soma' => $soma]);
    }
//---------------------------------------------------------------------
    public function exibirFormulario2(){
        return view('Exercicios.exerc2');
    }
    public function calcularSub(Request $request){
        $valor1 = $request -> input('valor1');
        $valor2 = $request -> input('valor2');
        $sub = $valor1 - $valor2;
        return view('Exercicios.exerc2',['sub'=> $sub]);
    }
//---------------------------------------------------------------------
    public function exibirFormulario3(){
        return view('Exercicios.exerc3');
    }
    public function calcularMultiplicacao(Request $request){
        $valor1 = $request -> input('valor1');
        $valor2 = $request -> input('valor2');
        $mul = $valor1 * $valor2;
        return view('Exercicios.exerc3',['mul'=> $mul]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario4(){
        return view('Exercicios.exerc4');
    }

    public function calcularDivisao(Request $request)
    {
    $valor1 = $request->input('valor1');
    $valor2 = $request->input('valor2');
    
    if($valor2 == 0) {
        $erro = 'Não é possível dividir por zero!';
        return view('Exercicios.exerc4', ['erro' => $erro]);
    } else {
        $div = $valor1 / $valor2;
        return view('Exercicios.exerc4', ['div' => $div]);
    }
    }      
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario5(){
        return view('Exercicios.exerc5');
    }

    public function calcularMedia(Request $request){
        $nota1 = $request->input('nota1');
        $nota2 = $request->input('nota2');
        $nota3 = $request->input('nota3');
        if ($nota1 < 0 || $nota2 < 0 || $nota3 < 0 ){
            $erro = 'O número não pode ser negativo';
            return view('Exercicios.exerc5',['erro' => $erro]);
        }else{
            $media = ($nota1 + $nota2 + $nota3) / 3;
            return view('Exercicios.exerc5', ['media' => $media]);
        }
    }
    
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario6(){
        return view('Exercicios.exerc6');
    }

    public function converterCelcius(Request $request){
        $celcius = $request->input('celcius');
        $f = ($celcius * 1.8) + 32;
        return view('Exercicios.exerc6', ['f' => $f ]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario7(){
        return view('Exercicios.exerc7');
    }

    public function converterFahrenheit(Request $request){
        $fahrenheit = $request->input('fahrenheit');
        $celcius = 5 / 9 * ($fahrenheit - 32);
        return view ('Exercicios.exerc7',['celcius' => $celcius]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    public function exibirFormulario8(){
        return view('Exercicios.exerc8');
    }
    public function calcularAreaR(Request $request){
        $altura = $request->input('altura');
        $largura = $request->input('largura');
        if ($altura < 1 || $largura < 1){
            $erro = 'A altura ou a largura é um número negativo ou 0!';
            return view('Exercicios.exerc8', ['erro' => $erro]);
        }else{
            $area = $altura * $largura;
            return view('Exercicios.exerc8', ['area' => $area]);
        }
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario9(){
        return view('Exercicios.exerc9');
    }
    public function calcularAreaC(Request $request){
        $raio = $request->input('raio');
        if($raio < 0){
            $erro = 'O valor do raio é inválido, tente um número positivo maior que 0!';
            return view('Exercicios.exerc9',['erro' => $erro]);
        }else{
            $area = M_PI * pow($raio, 2);//pow é uma função de PHP para elevar os números, já M_PI é uma função com o valor de PI guardado.
            return view ('Exercicios.exerc9',['area' => $area]);
        }
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario10(){
        return view ('Exercicios.exerc10');
    }
    public function calcularPerimetroR(Request $request){
        $altura = $request->input('altura');
        $largura = $request->input('largura');
        $perimetro = 2 * ($altura + $largura);
        return view ('Exercicios.exerc10', ['perimetro' => $perimetro]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario11(){
        return view ('Exercicios.exerc11');
    }
    public function calcularPerimetroC(Request $request){
        $raio = $request->input('raio');
        $perimetro = 2 * M_PI * $raio;
        return view ('Exercicios.exerc11', ['perimetro' => $perimetro]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario12(){
        return view('Exercicios.exerc12');
    }
    public function calcularPotencia(Request $request){
        $base = $request->input('base');
        $expoente = $request->input('expoente');
        $potencia = $base ** $expoente;
        return view('Exercicios.exerc12', ['potencia' => $potencia]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario13(){
        return view('Exercicios.exerc13');
    }
    public function converterCentimetros(Request $request){
        $metro = $request->input('m');
        $c = $metro * 100;
        return view('Exercicios.exerc13', ['c' => $c]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario14(){
        return view('Exercicios.exerc14');
    }
    public function converterParaMilhas(Request $request){
        $km = $request->input('km');
        $milhas = $km * 0.621371;
        return view('Exercicios.exerc14', ['milhas' => $milhas]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function exibirFormulario15(){
        return view('Exercicios.exerc15');
    }
    public function calcularIMC(Request $request){
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $imc = $peso / ($altura * $altura);
        return view ('Exercicios.exerc15', ['imc' => number_format($imc, 2)]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function exibirFormulario16(){
        return view('Exercicios.exerc16');
    }
    public function calcularDesconto(Request $request){
        $valor = $request->input('valor');
        $percentual = $request->input('percentual');
        $novoValor = $valor - ($valor * ($percentual / 100));
        return view('Exercicios.exerc16', ['novoValor' => $novoValor]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
     public function exibirFormulario17(){
        return view('Exercicios.exerc17');
    }

    public function calcularJurosSimples(Request $request){
        $capital = $request->input('capital');
        $taxa = $request->input('taxa');
        $periodo = $request->input('periodo');

        $taxaDecimal = $taxa / 100;
        $jurosSimples = $capital * $taxaDecimal * $periodo;

        return view('Exercicios.exerc17', [
            'jurosSimples' => $jurosSimples
        ]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
     public function exibirFormulario18(){
        return view('Exercicios.exerc18');
    }

    public function calcularMontante(Request $request){
        $capital = $request->input('capital');
        $taxa = $request->input('taxa');
        $periodo = $request->input('periodo');

        $taxaDecimal = $taxa / 100;
        $jurosSimples = $capital * $taxaDecimal * $periodo;
        $montante = $capital + $jurosSimples;

        return view('Exercicios.exerc18', [
            'jurosSimples' => $jurosSimples,
            'montante' => $montante
        ]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    
    public function exibirFormulario19(){
        return view('Exercicios.exerc19');
    }

    public function conversaoDias(Request $request){
        $dias = $request->input('dias');
        $total_horas = $dias * 24;
        $total_minutos = $total_horas * 60;
        $total_segundos = $total_minutos * 60;
        $conversao = "Horas: $total_horas hr Minutos: $total_minutos min  Segundos: $total_segundos seg";
        return view('Exercicios.exerc19', ['conversao' => $conversao]);
    }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function exibirFormulario20(){
        return view('Exercicios.exerc20');
    }

    public function calcularVelMedia(Request $request){
        $distancia = $request->input('distancia');
        $tempo = $request->input('tempo');
        $velMedia = $distancia / $tempo;
        $velMedia = round($velMedia, 2);
        return view('Exercicios.exerc20',['velMedia' => $velMedia]);
    }
}