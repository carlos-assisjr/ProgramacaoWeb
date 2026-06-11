@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<div class="d-flex justify-content-between mb-3">
    <h1>Equipamentos</h1>
    <a href="{{ url('/equipamento/create') }}" class="btn btn-primary">Novo Equipamento</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Loja</th>
            <th>Valor diária</th>
            <th>Status</th>
            <th width="220">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($equipamentos ?? [] as $equipamento)
            <tr>
                <td>
                    @if($equipamento->foto)
                        <img src="{{ asset('storage/' . $equipamento->foto) }}" width="70">
                    @else
                        Sem foto
                    @endif
                </td>
                <td>{{ $equipamento->nome }}</td>
                <td>{{ $equipamento->categoria->nome ?? '-' }}</td>
                <td>{{ $equipamento->loja->nome ?? '-' }}</td>
                <td>R$ {{ number_format($equipamento->valor_diaria, 2, ',', '.') }}</td>
                <td>{{ $equipamento->status }}</td>
                <td>
                    <a href="{{ url('/equipamento/' . $equipamento->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ url('/equipamento/' . $equipamento->id . '/edit') }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ url('/equipamento/' . $equipamento->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Nenhum equipamento cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
</main>
@endsection
