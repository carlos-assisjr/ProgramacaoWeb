@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício -  Conversão de Metros para Centímetros</h1>
<form method="post" action="/resposta13">
    @CSRF
<div class="mb-3">
        <label for="m" class="form-label">Informe os Metros: </label>
        <input type="number" id="m" name="m" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($c)
<p class="text-success">A conversão de Metros para centímetros é:  {{$c}} cm </p> <!--Utilizei a função round para deixar a variavél somente com duas casas após a virgula-->
@endisset
@endsection