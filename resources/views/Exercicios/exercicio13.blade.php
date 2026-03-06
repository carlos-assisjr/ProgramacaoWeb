@extends('layout')
@section('conteudo')
<h1>Exercício 13 - Converta p/ centimetro</h1>
<form method="post" action="/resposta13">
    @CSRF
<div class="mb-3">
        <label for="metro" class="form-label">informe o valor em metros </label>
        <input type="number" id="metro" name="metro" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($centimetro)
<p class="text-success">O valor em centímetros é: {{$centimetro}}
    @endisset
@endsection