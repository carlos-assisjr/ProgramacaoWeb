@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Área de um Retângulo</h1>
<form method="post" action="/resposta8">
    @CSRF
<div class="mb-3">
        <label for="altura" class="form-label">informe a altura do Retângulo</label>
        <input type="number" id="altura" name="altura" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="largura" class="form-label">informe o a largura do Retângulo</label>
    <input type="number" id="largura" name="largura" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($area)
<p class="text-success">A Área do Retângulo é: {{$area}}</p>
@endisset
@isset($erro)
<p class="text-danger"> {{$erro}}</p>
@endisset
@endsection