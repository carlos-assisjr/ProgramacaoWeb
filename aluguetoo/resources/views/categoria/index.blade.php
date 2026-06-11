@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
<div class="d-flex justify-content-between mb-3">
    <h1>Categorias</h1>
    <a href="{{ url('/categoria/create') }}" class="btn btn-primary">Nova Categoria</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th width="220">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categorias ?? [] as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->descricao }}</td>
                <td>
                    <a href="{{ url('/categoria/' . $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ url('/categoria/' . $categoria->id . '/edit') }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ url('/categoria/' . $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Nenhuma categoria cadastrada.</td></tr>
        @endforelse
    </tbody>
</table>
</main>
@endsection
