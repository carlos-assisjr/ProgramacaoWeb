@extends('site.layout')

@section('conteudo')
<h1>Editar Usuário</h1>

<form action="{{ url('/user/' . $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="mb-3">
        <label>CPF</label>
        <input type="text" name="cpf" class="form-control" value="{{ $user->cpf }}">
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ $user->telefone }}">
    </div>

    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco" class="form-control" value="{{ $user->endereco }}">
    </div>

    <div class="mb-3">
        <label>Perfil</label>
        <select name="role" class="form-control" required>
            <option value="CLI" @selected($user->role == 'CLI')>Cliente</option>
            <option value="ADM" @selected($user->role == 'ADM')>Administrador</option>
        </select>
    </div>

    <button class="btn btn-primary">Atualizar</button>
    <a href="{{ url('/user') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
