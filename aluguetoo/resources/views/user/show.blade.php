@extends('layout')

@section('conteudo')
    <h1>Consultar Usuário</h1>
    <form method="post" action="/users/{{ $user->id }}">
        @CSRF
        @METHOD('DELETE')

        <div class="mb-3">
            <p>Nome: <strong>{{ $user->name }}</strong></p>
        </div>

        <div class="mb-3">
            <p>E-mail: <strong>{{ $user->email }}</strong></p>
        </div>

        <button type="submit" class="btn btn-danger">Excluir o registro</button>
        <a href="/users" class="btn btn-secondary">Voltar</a>
    </form>
@endsection