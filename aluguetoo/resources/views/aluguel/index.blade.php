@extends('layout')

@section('conteudo')
<h1>Lista de Aluguéis</h1>

<a href="{{ route('alugueis.create') }}" class="btn btn-primary mb-3">Novo Aluguel</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
         <th>ID</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alugueis as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->cliente->nome ?? '-' }}</td>
            <td>{{ $a->status }}</td>
            <td>

                <a href="{{ route('alugueis.edit', $a->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('alugueis.destroy', $a->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja excluir?')">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection