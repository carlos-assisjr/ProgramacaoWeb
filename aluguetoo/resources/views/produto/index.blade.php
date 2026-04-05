@extends('layout')

@section('conteudo')
    
    <h2>Produtos</h2>
    <a href="/produtos/create" class="btn btn-success mb-3">Novo Registro</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor Diária</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->descricao }}</td>
                <td>R$ {{ number_format($p->valor_diaria, 2, ',', '.') }}</td>
                <td>{{ $p->status }}</td>
                <td class="d-flex gap-2">
                    <a href="/produtos/{{ $p->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/produtos/{{ $p->id }}" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection