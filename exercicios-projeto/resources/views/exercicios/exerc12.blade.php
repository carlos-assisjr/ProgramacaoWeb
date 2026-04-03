@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Potencialização</h1>
<form method="post" action="/resposta12">
    @CSRF
<div class="mb-3">
        <label for="base" class="form-label">Informe a base para a Potencialização: </label>
        <input type="number" id="base" name="base" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="expoente" class="form-label">Informe a expoente para a Potencialização: </label>
    <input type="number" id="expoente" name="expoente" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($potencia)
<p class="text-success">O resultado da potencialização é: {{$potencia}}</p>
@endisset
@endsection