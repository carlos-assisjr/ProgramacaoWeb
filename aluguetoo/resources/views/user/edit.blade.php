@extends('layout')

@section('conteudo')
    <h1>Editar Usuário</h1>
    <form method="post" action="/users/{{ $user->id }}">
        @CSRF
        @METHOD('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome:</label>
            <input type="text" id="nome"
                name="nome" class="form-control" required="" value="{{ $user->nome }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Informe o e-mail:</label>
            <input type="email" id="email"
                name="email" class="form-control" required="" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Informe a nova senha:</label>
            <input type="password" id="senha" name="senha" class="form-control">
            <small class="text-muted">Deixe em branco para manter a senha atual.</small>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection