@extends('layout')

@section('conteudo')

<h2>Equipamentos</h2>

<a href="{{ route('equipamentos.create') }}" class="btn btn-primary mb-3">
    Novo Registro
</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>N° Série</th>
            <th>Categoria</th>
            <th>Loja</th>
            <th>Valor Diária</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($equipamentos as $eq)
            <tr>
                <td>{{ $eq->id }}</td>

                <td>
                    @if($eq->foto)
                        <img src="{{ asset('storage/' . $eq->foto) }}" width="80" height="60" style="object-fit: cover;">
                    @else
                        Sem foto
                    @endif
                </td>

                <td>{{ $eq->nome }}</td>
                <td>{{ $eq->marca }}</td>
                <td>{{ $eq->numero_serie }}</td>
                <td>{{ $eq->categoria->nome ?? 'N/A' }}</td>
                <td>{{ $eq->loja->nome ?? '-' }}</td>
                <td>R$ {{ number_format($eq->valor_diaria, 2, ',', '.') }}</td>
                <td>{{ $eq->status }}</td>

                <td>
                    <a href="{{ route('equipamentos.edit', $eq->id) }}" class="btn btn-sm btn-warning">
                        Editar
                    </a>

                    <a href="{{ route('equipamentos.show', $eq->id) }}" class="btn btn-sm btn-info">
                        Consultar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection