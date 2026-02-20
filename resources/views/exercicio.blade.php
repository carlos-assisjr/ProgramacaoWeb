@extends('layout')
@section('conteudo')
<h1>Exercício 1</h1>
<form method="post" action="/resposta">
    @CSRF
<div class="mb-3">
        <label for="valor1" class="form-label">informe o primeiro valor</label>
        <input type="number" id="valor1" name="valor1" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="valor2" class="form-label">informe o segundo valor</label>
    <input type="number" id="valor2" name="valor2" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($soma)
<p class="text-sucess">O valor da soma é:{{$soma}}
    @endisset
@endsection