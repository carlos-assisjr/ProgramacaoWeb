@extends('layout')

@section('conteudo')

<h1>Consultar Equipamento</h1>

@if($equipamento->foto)
    <div class="mb-3">
        <img src="{{ asset('storage/' . $equipamento->foto) }}" width="300" style="object-fit: cover;">
    </div>
@endif

<div class="mb-3">
    <p>Nome: <strong>{{ $equipamento->nome }}</strong></p>
</div>

<div class="mb-3">
    <p>Marca: <strong>{{ $equipamento->marca }}</strong></p>
</div>

<div class="mb-3">
    <p>Número de série: <strong>{{ $equipamento->numero_serie }}</strong></p>
</div>

<div class="mb-3">
    <p>Categoria: <strong>{{ $equipamento->categoria->nome ?? 'N/A' }}</strong></p>
</div>

<div class="mb-3">
    <p>Loja: <strong>{{ $equipamento->loja->nome ?? '-' }}</strong></p>
</div>

<div class="mb-3">
    <p>Descrição: <strong>{{ $equipamento->descricao }}</strong></p>
</div>

<div class="mb-3">
    <p>Valor da diária:
        <strong>R$ {{ number_format($equipamento->valor_diaria, 2, ',', '.') }}</strong>
    </p>
</div>

<div class="mb-3">
    <p>Status: <strong>{{ $equipamento->status }}</strong></p>
</div>

<form method="post" action="{{ route('equipamentos.destroy', $equipamento->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">
        Excluir o registro
    </button>

    <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">
        Voltar
    </a>
</form>

@endsection