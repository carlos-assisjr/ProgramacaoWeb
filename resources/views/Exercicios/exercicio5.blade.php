@extends('layout')
@section('conteudo')
<h1>Exercício 5 - Média</h1>
<form method="post" action="/resposta5">
    @CSRF
<div class="mb-3">
        <label for="valor1" class="form-label">informe o primeiro valor</label>
        <input type="number" id="valor1" name="valor1" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="valor2" class="form-label">informe o segundo valor</label>
    <input type="number" id="valor2" name="valor2" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="valor3" class="form-label">informe o terceiro valor</label>
    <input type="number" id="valor3" name="valor3" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($media)
<p class="text-success">O valor da média é: {{$media}}
    @endisset
@endsection