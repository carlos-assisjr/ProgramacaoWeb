@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - IMC</h1>
<form method="post" action="/resposta15">
    @CSRF
<div class="mb-3">
        <label for="peso" class="form-label">Informe o seu peso: </label>
        <input type="number" id="peso" name="peso" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="altura" class="form-label">Informe a sua altura: </label>
    <input type="number" step="0.01"  id="altura" name="altura" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($imc)
<p class="text-success">O resultado do seu IMC é: {{$imc}}</p>
@endisset
@endsection