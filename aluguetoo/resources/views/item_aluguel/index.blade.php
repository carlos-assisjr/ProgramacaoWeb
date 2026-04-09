@extends('layout')

@section('conteudo')
<h1>Lista de Itens do Aluguel</h1>

<a href="{{ route('itens_aluguel.create') }}" class="btn btn-primary mb-3">Novo Item</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Aluguel</th>
            <th>Ferramenta</th>
            <th>Valor Diária</th>
            <th>Loja Retirada</th>
            <th>Loja Devolução</th>
            <th>Data Início</th>
            <th>Data Fim Prevista</th>
            <th>Data Devolução</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itensAluguel as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->aluguel->cliente->nome ?? '-' }}</td>
            <td>{{ $item->ferramenta->nome ?? '-' }}</td>
            <td>R$ {{ number_format($item->valor_diaria_contratada, 2, ',', '.') }}</td>
            <td>{{ $item->lojaRetirada->nome ?? '-' }}</td>
            <td>{{ $item->lojaDevolucao->nome ?? '-' }}</td>
            <td>{{ $item->data_inicio }}</td>
            <td>{{ $item->data_fim_prevista }}</td>
            <td>{{ $item->data_devolucao ?? '-' }}</td>
            <td>
                <a href="{{ route('itens_aluguel.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('itens_aluguel.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja realmente excluir?')">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection