@extends('site.layout')

@section('conteudo')
<div class="d-flex justify-content-between mb-3">
    <h1>Lojas</h1>
    <a href="{{ url('/loja/create') }}" class="btn btn-primary">Nova Loja</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th width="220">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lojas ?? [] as $loja)
            <tr>
                <td>{{ $loja->id }}</td>
                <td>{{ $loja->nome }}</td>
                <td>{{ $loja->cidade }}</td>
                <td>{{ $loja->estado }}</td>
                <td>
                    <a href="{{ url('/loja/' . $loja->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ url('/loja/' . $loja->id . '/edit') }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ url('/loja/' . $loja->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Nenhuma loja cadastrada.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
