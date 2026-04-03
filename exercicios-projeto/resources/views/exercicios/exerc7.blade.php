@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Conversão de Fahrenheit para Celcius</h1>
<form method="post" action="/resposta7">
    @CSRF
<div class="mb-3">
        <label for="fahrenheit" class="form-label">Informe o Fahrenheit: </label>
        <input type="number" id="fahrenheit" name="fahrenheit" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($celcius)
<p class="text-success">O valor de Fahrenheit convertido para Celcius: {{round($celcius, 2)}} C°</p> <!--Utilizei a função round para deixar com duas casas após a virgula-->
@endisset
@endsection