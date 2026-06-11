@extends('site.layout')

@section('conteudo')
<h1>Novo Aluguel</h1>

<div class="alert alert-warning">
    O ideal é criar o aluguel pelo carrinho. Esta tela ficou apenas para evitar erro caso sua rota exista.
</div>

<a href="{{ url('/carrinho') }}" class="btn btn-primary">Ir para o carrinho</a>
<a href="{{ url('/aluguel') }}" class="btn btn-secondary">Voltar</a>
@endsection
