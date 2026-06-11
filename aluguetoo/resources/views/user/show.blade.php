@extends('site.layout')

@section('conteudo')
<h1>Usuário</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>CPF:</strong> {{ $user->cpf }}</p>
        <p><strong>Telefone:</strong> {{ $user->telefone }}</p>
        <p><strong>Endereço:</strong> {{ $user->endereco }}</p>
        <p><strong>Perfil:</strong> {{ $user->role }}</p>
    </div>
</div>

<a href="{{ url('/user') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
