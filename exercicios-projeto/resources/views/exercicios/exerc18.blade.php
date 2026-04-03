@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Montante</h1>
<form method="post" action="/resposta18">
    @CSRF
<div class="mb-3">
        <label for="capital" class="form-label">Informe o capital: </label>
        <input type="number" id="capital" name="capital" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="taxa" class="form-label">Informe a taxa: </label>
    <input type="number" id="taxa" name="taxa" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="periodo" class="form-label">Informe o periodo: </label>
    <input type="number" id="periodo" name="periodo" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($jurosSimples)
<p class="text-success">O valor dos juros é: {{$jurosSimples}}</p> 
@endisset
@isset($montante)
<p class="text-success">O montante é: {{$montante}}</p> 
@endisset
@endsection