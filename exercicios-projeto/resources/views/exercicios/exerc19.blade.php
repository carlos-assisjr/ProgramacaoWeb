@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício -  Convesão de dias para horas minutos e segundos</h1>
<form method="post" action="/resposta19">
    @CSRF
<div class="mb-3">
        <label for="dias" class="form-label">Informe os Dias: </label>
        <input type="number" id="dias" name="dias" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($conversao)
<p class="text-success">A conversão de Dias para Horas, Minutos e Segundos é:  {{$conversao}}</p> 
@endisset
@endsection