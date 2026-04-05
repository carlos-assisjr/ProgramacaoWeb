@extends('layout')

@section('conteudo')
    
    <h2>Unidades do Produto</h2>
    <a href="/unidade_produtos/create" class="btn btn-success mb-3">Novo Registro</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto ID</th>
                <th>Código</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidade_produtos as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->produto_id }}</td>
                <td>{{ $u->codigo }}</td>
                <td>{{ $u->status }}</td>
                <td class="d-flex gap-2">
                    <a href="/unidade_produtos/{{ $u->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/unidade_produtos/{{ $u->id }}" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection