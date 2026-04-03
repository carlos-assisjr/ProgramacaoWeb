@extends('exercicios.layout_exer')
@section('conteudo')
<h1>Exercício - Média entre 3 notas</h1>
<form method="post" action="/resposta5">
    @CSRF
<div class="mb-3">
        <label for="nota1" class="form-label">Informe o valor da primeira nota: </label>
        <input type="number" id="nota1" name="nota1" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="nota2" class="form-label">Informe o valor da segunda nota: </label>
    <input type="number" id="nota2" name="nota2" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="nota3" class="form-label">Informe o valor da terceira nota: </label>
    <input type="number" id="nota3" name="nota3" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($media)
<p class="text-success">O valor da média das notas é: {{round($media, 2)}}</p> <!--Utilizei a função round para deixar a variavél somente com duas casas após a virgula-->
@endisset
@isset($erro)
<p class="text-danger"> {{$erro}}</p>
@endisset
@endsection