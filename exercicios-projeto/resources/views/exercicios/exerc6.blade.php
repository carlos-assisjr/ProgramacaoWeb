@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Conversão de Celcius para Fahrenheit</h1>
<form method="post" action="/resposta6">
    @CSRF
<div class="mb-3">
        <label for="celcius" class="form-label">Informe o Celcius: </label>
        <input type="number" id="celcius" name="celcius" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($f)
<p class="text-success">O valor de Celcius convertido para Fahrenheit: {{round($f, 2)}} F°</p> <!--função round para deixar com duas casas após a virgula-->
@endisset
@endsection