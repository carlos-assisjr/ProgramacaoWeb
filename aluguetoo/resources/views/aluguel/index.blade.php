@extends('site.layout')

@section('conteudo')
<h1>Aluguéis</h1>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Data</th>
            <th width="180">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($alugueis ?? [] as $aluguel)
            <tr>
                <td>{{ $aluguel->id }}</td>
                <td>{{ $aluguel->user->name ?? '-' }}</td>
                <td>{{ $aluguel->status }}</td>
                <td>{{ $aluguel->created_at ? $aluguel->created_at->format('d/m/Y H:i') : '-' }}</td>
                <td>
                    <a href="{{ url('/aluguel/' . $aluguel->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ url('/aluguel/' . $aluguel->id . '/edit') }}" class="btn btn-sm btn-warning">Editar</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Nenhum aluguel cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
