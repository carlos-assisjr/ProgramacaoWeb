@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<h1>Equipamento</h1>

<div class="card">
    <div class="card-body">
        @if($equipamento->foto)
            <img src="{{ asset('storage/' . $equipamento->foto) }}" width="200" class="mb-3">
        @endif

        <p><strong>Nome:</strong> {{ $equipamento->nome }}</p>
        <p><strong>Marca:</strong> {{ $equipamento->marca }}</p>
        <p><strong>Número de série:</strong> {{ $equipamento->numero_serie }}</p>
        <p><strong>Categoria:</strong> {{ $equipamento->categoria->nome ?? '-' }}</p>
        <p><strong>Loja:</strong> {{ $equipamento->loja->nome ?? '-' }}</p>
        <p><strong>Valor diária:</strong> R$ {{ number_format($equipamento->valor_diaria, 2, ',', '.') }}</p>
        <p><strong>Status:</strong> {{ $equipamento->status }}</p>
        <p><strong>Descrição:</strong> {{ $equipamento->descricao }}</p>
    </div>
</div>

<a href="{{ url('/equipamento') }}" class="btn btn-secondary mt-3">Voltar</a>
</main>
@endsection
