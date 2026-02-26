@extends('layout')
@section('conteudo')
<h1>Exercício 6 -converte temperatura para Fahrenheit</h1>
<form method="post" action="/resposta6">
    @CSRF
<div class="mb-3">
        <label for="valor1" class="form-label">informe a temperatura em Celsius</label>
        <input type="number" id="valor1" name="valor1" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($temperatura)
<p class="text-success">A temperatura em Fahrenheit é: {{$temperatura}}
    @endisset
@endsection