@extends('layout')

@section('conteudo')

<h2>Ferramentas</h2>
<a href="/ferramentas/create" class="btn btn-success mb-3">Novo Registro</a>

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
        @foreach($ferramentas as $f)
        <tr>
            <td>{{ $f->id }}</td>
            <td>{{ $f->nome }}</td>
            <td>{{ $f->marca }}</td>
            <td>{{ $f->numero_serie }}</td>
            <td>{{ $f->descricao }}</td>
            <td>{{ $f->categoria->nome ?? 'N/A' }}</td>
            <td>{{ $f->loja->nome ?? '-' }}</td>

            <td>R$ {{ number_format($f->valor_diaria, 2, ',', '.') }}</td>
            <td>{{ $f->status }}</td>
            <td class="d-flex gap-2">
                <a href="/ferramentas/{{ $f->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                <a href="/ferramentas/{{ $f->id }}" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection