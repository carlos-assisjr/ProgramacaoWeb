@extends('layout')
@section('conteudo')
<h1>Exercício 8 - Area Retângulo</h1>
<form method="post" action="/resposta8">
    @CSRF
<div class="mb-3">
        <label for="largura" class="form-label">informe a largura </label>
        <input type="number" id="largura" name="largura" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="altura" class="form-label">informe a altura</label>
    <input type="number" id="altura" name="altura" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($area)
<p class="text-success">O valor da área é: {{$area}}
    @endisset
@endsection