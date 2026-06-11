@extends('site.layout')

@section('conteudo')
<div class="d-flex justify-content-between mb-3">
    <h1>Usuários</h1>
    <a href="{{ url('/user/create') }}" class="btn btn-primary">Novo Usuário</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th width="220">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users ?? [] as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ url('/user/' . $user->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ url('/user/' . $user->id . '/edit') }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ url('/user/' . $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Nenhum usuário cadastrado.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
