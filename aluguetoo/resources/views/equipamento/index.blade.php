@extends('layout')

@section('conteudo')

<h2>Equipamentos</h2>
<a href="/equipamentos/create" class="btn btn-primary mb-3">Novo Registro</a>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>N° Série</th>
            <th>Descrição</th>
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
            <td>{{ $eq->nome }}</td>
            <td>{{ $eq->marca }}</td>
            <td>{{ $eq->numero_serie }}</td>
            <td>{{ $eq->descricao }}</td>
            <td>{{ $eq->categoria->nome ?? 'N/A' }}</td>
            <td>{{ $eq->loja->nome ?? '-' }}</td>

            <td>R$ {{ number_format($eq->valor_diaria, 2, ',', '.') }}</td>
            <td>{{ $eq->status }}</td>
            <td>
                <a href="/equipamentos/{{ $eq->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <a href="/equipamentos/{{ $eq->id }}" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection