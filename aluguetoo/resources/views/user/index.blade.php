@extends('layout')

@section('conteudo')
    
    <h2>Usuários</h2>
    <a href="users/create" class="btn btn-success mb-3">Novo Registro</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->nome }}</td>
                <td>{{ $u->email }}</td>
                <td class="d-flex gap-2">
                    <a href="/users/{{ $u->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/users/{{ $u->id }}" class="btn btn-sm btn-info">Consultar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection