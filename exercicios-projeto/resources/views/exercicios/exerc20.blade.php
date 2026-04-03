@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Velocidade Média</h1>
<form method="post" action="/resposta20">
    @CSRF
<div class="mb-3">
        <label for="distancia" class="form-label">Informe a distancia: </label>
        <input type="number" id="distancia" name="distancia" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="tempo" class="form-label">Informe a tempo: </label>
    <input type="number" id="tempo" name="tempo" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($velMedia)
<p class="text-success">A sua velocidade média é: {{$velMedia}}</p>
@endisset
@endsection