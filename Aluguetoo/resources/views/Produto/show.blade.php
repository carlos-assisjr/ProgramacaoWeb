@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>

    <p><strong>Nome:</strong> {{ $p->nome }}</p>
    <p><strong>Descrição:</strong> {{ $p->descricao }}</p>
    <p><strong>Categoria:</strong> {{ $p->categoria->nome }}</p>
    <p><strong>Valor Diária:</strong> R$ {{ number_format($p->valor_diaria, 2, ',', '.') }}</p>
    <p><strong>Estoque:</strong> {{ $p->estoque }}</p>
    <p><strong>Status:</strong> {{ $p->status }}</p>

    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection