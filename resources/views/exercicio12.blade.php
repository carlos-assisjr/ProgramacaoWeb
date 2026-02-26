@extends('layout')
@section('conteudo')
<h1>Exercício 12 - Potenciação</h1>
<form method="post" action="/resposta12">
    @CSRF
<div class="mb-3">
        <label for="base" class="form-label">informe a base </label>
        <input type="number" id="base" name="base" class="form-control" required="">
</div>
<div class="mb-3">
    <label for="expoente" class="form-label">informe a expoente</label>
    <input type="number" id="expoente" name="expoente" class="form-control" required="">
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@isset($potencia)
<p class="text-success">O valor da potência é: {{$potencia}}
    @endisset
@endsection