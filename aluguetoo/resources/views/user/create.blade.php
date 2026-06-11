@extends('site.layout')

@section('conteudo')
<main class="dashboard-container">
    <h1>Novo Usuário</h1>

    <form action="{{ url('/user') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control">
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control">
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Perfil</label>
            <select name="role" class="form-control" required>
                <option value="CLI">Cliente</option>
                <option value="ADM">Administrador</option>
            </select>
        </div>

        <button class="btn btn-primary">Salvar</button>
        <a href="{{ url('/user') }}" class="btn btn-secondary">Voltar</a>
    </form>
</main>
@endsection