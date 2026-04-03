@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício -  Conversão de Quilometros para Milhas</h1>
<form method="post" action="/resposta14">
    @CSRF
<div class="mb-3">
        <label for="km" class="form-label">Informe os Quilometros: </label>
        <input type="number" id="km" name="km" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($milhas)
<p class="text-success">A conversão de Quilometros para Milhas é:  {{$milhas}} milhas </p> <!--Utilizei a função round para deixar a variavél somente com duas casas após a virgula-->
@endisset
@endsection