@extends('layout')
@section('conteudo')
<h1>Exercício 9 - Area Circulo</h1>
<form method="post" action="/resposta9">
    @CSRF
<div class="mb-3">
        <label for="raio" class="form-label">informe o raio </label>
        <input type="number" id="raio" name="raio" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($area)
<p class="text-success">O valor da área é: {{$area}}
    @endisset
@endsection