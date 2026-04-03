@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício -  Perímetro de um Círculo</h1>
<form method="post" action="/resposta11">
    @CSRF
<div class="mb-3">
        <label for="raio" class="form-label">Informe o Raio: </label>
        <input type="number" id="raio" name="raio" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($perimetro)
<p class="text-success">O Perímetro de um Círculo é:  {{round($perimetro, 2)}} </p> <!--Utilizei a função round para deixar a variavél somente com duas casas após a virgula-->
@endisset
@endsection