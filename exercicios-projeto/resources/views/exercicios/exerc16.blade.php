@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Valor com Desconto</h1>
<form method="post" action="/resposta16">
    @CSRF
<div class="mb-3">
        <label for="valor" class="form-label">Informe o seu valor: </label>
        <input type="number" id="valor" name="valor" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="percentual" class="form-label">Informe o seu percentual: </label>
    <input type="number" id="percentual" name="percentual" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($novoValor)
<p class="text-success">O seu novo valor é: R$ {{$novoValor}}</p>
@endisset
@endsection