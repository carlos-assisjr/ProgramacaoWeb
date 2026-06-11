@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<h1>Detalhes do Aluguel</h1>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $aluguel->id }}</p>
        <p><strong>Cliente:</strong> {{ $aluguel->user->name ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $aluguel->status }}</p>
    </div>
</div>

<h4>Itens do aluguel</h4>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Equipamento</th>
            <th>Início</th>
            <th>Fim previsto</th>
            <th>Valor diária</th>
        </tr>
    </thead>
    <tbody>
        @forelse($aluguel->itens ?? [] as $item)
            <tr>
                <td>{{ $item->equipamento->nome ?? '-' }}</td>
                <td>{{ $item->data_inicio }}</td>
                <td>{{ $item->data_fim_prevista }}</td>
                <td>R$ {{ number_format($item->valor_diaria_contratada, 2, ',', '.') }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Nenhum item neste aluguel.</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ url('/aluguel') }}" class="btn btn-secondary">Voltar</a>
</main>
@endsection
