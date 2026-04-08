@extends('layout')

@section('conteudo')
<h1>Detalhes da Ferramenta</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $ferramenta->id }}</p>
        <p><strong>Nome:</strong> {{ $ferramenta->nome }}</p>
        <p><strong>Marca:</strong> {{ $ferramenta->marca }}</p>
        <p><strong>Número de Série:</strong> {{ $ferramenta->numero_serie ?? '-' }}</p>
        <p><strong>Descrição:</strong> {{ $ferramenta->descricao ?? '-' }}</p>
        <p><strong>Categoria:</strong> {{ $ferramenta->categoria->nome ?? '-' }}</p>
        <p><strong>Loja:</strong> {{ $ferramenta->loja->nome ?? '-' }}</p>
        <p><strong>Valor da Diária:</strong> R$ {{ number_format($ferramenta->valor_diaria, 2, ',', '.') }}</p>
        <p><strong>Status:</strong> {{ $ferramenta->status }}</p>
    </div>
</div>

<a href="{{ route('ferramentas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
<a href="{{ route('ferramentas.edit', $ferramenta->id) }}" class="btn btn-warning mt-3">Editar</a>
@endsection