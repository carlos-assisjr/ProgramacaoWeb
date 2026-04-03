@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Perímetro de um Retângulo</h1>
<form method="post" action="/resposta10">
    @CSRF
<div class="mb-3">
        <label for="altura" class="form-label">informe a altura do Retângulo</label>
        <input type="number" id="altura" name="altura" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="largura" class="form-label">informe a largura do Retângulo</label>
    <input type="number" id="largura" name="largura" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($perimetro)
<p class="text-success">O Perímetro do Retângulo é: {{$perimetro}}</p>
@endisset
@endsection