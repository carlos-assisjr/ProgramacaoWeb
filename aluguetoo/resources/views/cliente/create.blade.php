@extends('layout')

@section('conteudo')
<h1>Cadastrar Cliente</h1>

<form action="/clientes" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Endereço:</label>
        <input type="text" name="endereco" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Senha:</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection